<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\EnrollmentsTable&\Cake\ORM\Association\HasMany $Enrollments
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Enrollments', [
            'foreignKey' => 'user_id',
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
            ->maxLength('name', 100, 'El Nombre es demasiado largo')
            ->requirePresence('name', 'Debe completar este campo', 'create')
            ->notEmptyString('name', 'Este campo no puede estar vacío');

        $validator
            ->scalar('paternal_last_name')
            ->maxLength('paternal_last_name', 50, 'El Apellido es demasiado largo')
            ->requirePresence('paternal_last_name', 'Debe completar este campo', 'create')
            ->notEmptyString('paternal_last_name', 'Este campo no puede estar vacío');

        $validator
            ->scalar('maternal_last_name')
            ->maxLength('maternal_last_name', 50, 'El Apellido es demasiado largo')
            ->allowEmptyString('maternal_last_name', null, true);

        $validator
            ->email('email', 'Debe ingresar un correo válido')
            ->requirePresence('email', 'Debe completar este campo', 'create')
            ->notEmptyString('email', 'Este campo no puede estar vacío')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'Debe completar este campo', 'create')
            ->notEmptyString('password', 'Este campo no puede estar vacío', 'create')
            ->allowEmptyString('password', null, 'update');

        $validator
            ->requirePresence('is_active', true)
            ->allowEmptyString('is_active');

        $validator
            ->dateTime('create_at')
            ->notEmptyDateTime('create_at');

        $validator
            ->dateTime('update_at')
            ->allowEmptyDateTime('update_at');

        $validator
            ->dateTime('delete_at')
            ->allowEmptyDateTime('delete_at');
        
        $validator
            ->requirePresence('role_id', 'Debe seleccionar un rol')
            ->notEmptyString('role_id', 'Debe seleccionar un rol');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }


    /**
     * Search only records that are not deleted
     */
    public function beforeFind($event, $query, $options, $primary)
    {
        $query->where(['delete_at IS' => null]);
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
     * Finder for authentication
     */
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        return $query->select([
            'Users.id', 'Users.email', 'Users.name', 'Users.password', 'Roles.name'
        ])
        ->contain(['Roles'])
        ->where([
            'AND' => [
                'Users.delete_at IS' => null,
                'Users.is_active' => 1
            ]
        ]);
    }

}
