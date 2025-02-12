<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function isAuthorized($user)
    {
        if ( !empty($user['role']['name']) && $user['role']['name'] === 'USER' )
        {
            if ( in_array($this->request->getParam('action'), ['home', 'view']) )
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
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if( $this->Auth->user()['role']['name'] === 'USER' )
        {
            if( $this->Auth->user()['id'] !== $id )
            {
                return $this->redirect(['action' => 'home']);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => [
                'Roles', 
                'Enrollments' => ['Courses']
            ],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido creado con éxito');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se ha podido crear el usuario, por favor intente nuevamente.');
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido editado.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El usuario no se pudo guardar, por favor intente nuevamente.');
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        date_default_timezone_set('America/Santiago');
        $user->delete_at = date("Y-m-d H:i:s");
        if ($this->Users->save($user)) {
            $this->Flash->success('El usuario ha sido eliminado');
        } else {
            $this->Flash->error('No se pudo eliminar el usuario, por favor intente nuevamente');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function home()
    {
        $role = $this->Auth->user()['role']['name'];
        $coursesTable = TableRegistry::get('Courses');

        if( $role === 'ADMIN' )
        {
            $courses = $coursesTable->find('all', [
                'contain' => ['Enrollments'],
                'conditions' => [
                    'AND' => [
                        'delete_at IS' => null,
                        'is_enabled' => 1
                    ]
                ]
            ]);
            $totalCourses = $courses->count();
            $students = $this->Users->find('all', [
                'contain' => ['Roles'],
                'conditions' => [
                    'AND' => [
                        'Users.delete_at IS' => null,
                        'Users.is_active' => 1,
                        'Roles.name' => 'USER'
                    ]
                ]
            ]);
            $totalStudents = $students->count();
            $enrollmentsTable = TableRegistry::get('Enrollments');
            $enrollments = $enrollmentsTable->find('all');
            $totalEnrollments = $enrollments->count();

            $this->set(compact('courses', 'totalCourses', 'totalStudents','totalEnrollments'));
        }

        if( $role === 'USER' )
        {
            $enrollmentsTable = TableRegistry::get('Enrollments');
            $id = $this->Auth->user()['id'];
            $enrollments = $enrollmentsTable
                                ->find('all')
                                ->contain(['Courses'])
                                ->where([
                                    'AND' => [
                                        'Enrollments.user_id' => $id,
                                        'Courses.delete_at IS' => null,
                                        'Courses.is_enabled' => 1
                                    ]
                                ]);
            $this->set(compact('enrollments'));
        }
    }


    public function search()
    {
        if ($this->request->is('ajax')) {
            $query = $this->request->getQuery('search');

            $this->loadModel('Users'); 
            if( strlen($query) == 0 )
            {
                $users = $this->paginate($this->Users);
            }
            else
            {
                $users = $this->Users->find('all', [
                            'conditions' => [
                                'OR' => [
                                    'Users.name LIKE' => '%' . $query . '%',
                                    'Users.paternal_last_name LIKE' => '%' . $query . '%',
                                    'Users.maternal_last_name LIKE' => '%' . $query . '%',
                                    'Users.email LIKE' => '%' . $query . '%'
                                ]
                            ]
                        ]);
            }
            $totalUsers = $users->count();
            $this->set(compact('users', 'totalUsers'));

            return $this->render('/Element/Users/users_table');
        }

        $queryParams = $this->request->getQuery();
        return $this->redirect(['action' => 'index'] + $queryParams);
    }


    public function getEnrollmentCourses()
    {
        if( $this->request->is('ajax') )
        {
            $id = $this->request->getQuery('id');
            if( $id )
            {
                $user = $this->Users->get($id, [
                    'contain' => [
                        'Roles', 
                        'Enrollments' => ['Courses']
                    ],
                ]);
        
                $this->set('user', $user);
            }
            return $this->render('/Element/Users/enrollments_table');
        }
    }


    public function searchStudent()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $query = $this->request->getQuery('search');

            $this->loadModel('Users');
            $users = $this->Users->find('all', [
                'contain' => ['Roles'],
                'conditions' => [
                            'AND' => [
                                'OR' => [
                                    'Users.name LIKE' => '%' . $query . '%',
                                    'Users.paternal_last_name LIKE' => '%' . $query . '%',
                                    'Users.maternal_last_name LIKE' => '%' . $query . '%',
                                    'Users.email LIKE' => '%' . $query . '%'
                                ],
                                'Users.delete_at IS' => null,
                                'Users.is_active' => 1,
                                'Roles.name' => 'USER'
                            ]
                        ]
            ])->toArray();

            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($users));
        }
    }

}
