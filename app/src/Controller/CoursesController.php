<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 *
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    /**
     * Rules for authorization
     */
    public function isAuthorized($user)
    {
        if ( !empty($user['role']['name']) && $user['role']['name'] === 'USER' )
        {
            if ( in_array($this->request->getParam('action'), ['view']) )
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $courses = $this->paginate($this->Courses);

        $this->set(compact('courses'));
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if( $this->Auth->user()['role']['name'] === 'USER' )
        {
            $enrollmentsTable = TableRegistry::get('Enrollments');
            $enrollment = $enrollmentsTable
                                ->find()
                                ->where([
                                    'AND' => [
                                        'Enrollments.user_id' => $this->Auth->user()['id'],
                                        'Enrollments.course_id' => $id
                                    ]
                                ])
                                ->first();
            if( empty($enrollment) )
            {
                return $this->redirect(['controller' => 'Users', 'action' => 'home']);
            }
        }
        $course = $this->Courses->get($id, [
            'contain' => ['Enrollments' => ['Users']],
        ]);

        $this->set('course', $course);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->success('El curso ha sido creado');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se ha podido crear el curso, por favor intente nuevamente.');
        }
        $this->set(compact('course'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->success('El curso ha sido actualizado');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se ha podido actualizar el curso, por favor intente nuevamente');
        }
        $this->set(compact('course'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        date_default_timezone_set('America/Santiago');
        $course->delete_at = date("Y-m-d H:i:s");
        if ($this->Courses->save($course)) {
            $this->Flash->success('El curso ha sido eliminado');
        } else {
            $this->Flash->error('El curso no se ha podido eliminar, por favor intente nuevamente');
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Search courses for ajax
     * 
     * @return view element view
     */
    public function search()
    {
        if ($this->request->is('ajax')) {
            $query = $this->request->getQuery('search');

            $this->loadModel('Courses'); 
            if( strlen($query) == 0 )
            {
                $courses = $this->paginate($this->Courses);
            }
            else
            {
                $courses = $this->Courses->find('all', [
                            'conditions' => ['Courses.name LIKE' => '%' . $query . '%']
                        ]);
            }
            $totalCourses = $courses->count();
            $this->set(compact('courses', 'totalCourses'));

            return $this->render('/Element/Courses/courses_table');
        }

        $queryParams = $this->request->getQuery();
        return $this->redirect(['action' => 'index'] + $queryParams);
    }


    /**
     * Enroll user in a course using ajax
     * 
     * @return json messeage
     */
    public function enroll()
    {
        $this->autoRender = false;
        $message = [];

        if($this->request->is('ajax'))
        {
            $userId = $this->request->getQuery('userId');
            $courseId = $this->request->getQuery('courseId');
            if( !empty($userId) && !empty($courseId) )
            {
                $message = [
                    'type' => 'success',
                    'message' => 'El estudiante se ha inscrito en el curso'
                ];
                $enrollmentsTable = TableRegistry::get('Enrollments');
                $enrollment = $enrollmentsTable
                                    ->find()
                                    ->where([
                                        'AND' => [
                                            'Enrollments.user_id' => $userId,
                                            'Enrollments.course_id' => $courseId
                                        ]
                                    ])
                                    ->first();
                if( empty($enrollment) )
                {
                    $enrollment = $enrollmentsTable->newEntity();
                    $enrollment->user_id = $userId;
                    $enrollment->course_id = $courseId;
                    date_default_timezone_set('America/Santiago');
                    $enrollment->create_at = date("Y-m-d H:i:s");
                    if( !$enrollmentsTable->save($enrollment) )
                    {
                        $message = [
                            'type' => 'danger',
                            'message' => 'No se pudo inscribir el estudiante, intente nuevamente'
                        ];
                    }
                }
            }
            else
            {
                $message = [
                    'type' => 'danger',
                    'message' => 'Error en la consulta, intente nuevamente'
                ];
            }
        }

        return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($message));
    }


    /**
     * Delete a user enrollment
     */
    public function deleteEnrollment()
    {
        $this->request->allowMethod(['post', 'delete']);
        $userId = $this->request->getQuery('userId');
        $courseId = $this->request->getQuery('courseId');

        $enrollmentsTable = TableRegistry::get('Enrollments');
        $enrollment = $enrollmentsTable
                            ->find()
                            ->where([
                                'AND' => [
                                    'Enrollments.user_id' => $userId,
                                    'Enrollments.course_id' => $courseId
                                ]
                            ])
                            ->first();

        if ($enrollmentsTable->delete($enrollment)) {
            $this->Flash->success('La inscripción ha sido eliminada');
        } else {
            $this->Flash->error('La inscripción no se ha podido eliminar, por favor intente nuevamente');
        }

        $fromUser = $this->request->getQuery('fromUser');
        if( $fromUser )
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'view', $userId]);
        }
        return $this->redirect(['action' => 'view', $courseId]);
    }

    
    /**
     * Search for users enrolled in the course
     * 
     * @return view element view 
     */
    public function getEnrollmentUsers()
    {
        if( $this->request->is('ajax') )
        {
            $id = $this->request->getQuery('id');
            if( $id )
            {
                $course = $this->Courses->get($id, [
                    'contain' => ['Enrollments' => ['Users']],
                ]);
        
                $this->set('course', $course);
            }
            return $this->render('/Element/Courses/enrollments_table');
        }
    }


    /**
     * Search courses by a criteria
     * 
     * @return json array of courses
     */
    public function searchCourse()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $query = $this->request->getQuery('search');

            $this->loadModel('Courses');
            $courses = $this->Courses->find('all', [
                'conditions' => [
                            'AND' => [
                                'Courses.name LIKE' => '%' . $query . '%',
                                'Courses.delete_at IS' => null,
                                'Courses.is_enabled' => 1,
                            ]
                        ]
            ])->toArray();

            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($courses));
        }
    }
}
