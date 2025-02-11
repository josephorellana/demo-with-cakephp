<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \App\Model\Table\EnrollmentsTable&\Cake\ORM\Association\HasMany $Enrollments
 *
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, callable $callback = null, $options = [])
 */
class CoursesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('courses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Enrollments', [
            'foreignKey' => 'course_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', true)
            ->notEmptyString('name', 'Debe completar este campo');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->date('start_date', ['ymd'], 'Debe ingresar una fecha válida')
            ->allowEmptyDate('start_date');

        $validator
        ->date('end_date', ['ymd'], 'Debe ingresar una fecha válida')
        ->allowEmptyDate('end_date');

        $validator
            ->requirePresence('is_enabled', true)
            ->allowEmptyString('is_enabled', null, true);

        $validator
            ->dateTime('create_at')
            ->notEmptyDateTime('create_at');

        $validator
            ->dateTime('delete_at')
            ->allowEmptyDateTime('delete_at');

        return $validator;
    }


    /**
     * Clean fields
     */
    public function beforeMarshal($event, $data, $options)
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = trim($value);
            }
        }
    }


    /**
     * Search only records that are not deleted
     */
    public function beforeFind($event, $query, $options, $primary)
    {
        $query->where(['delete_at IS' => null]);
    }
}
