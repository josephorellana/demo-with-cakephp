<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property $id
 * @property string $name
 * @property string $paternal_last_name
 * @property string|null $maternal_last_name
 * @property string $email
 * @property string $password
 * @property int $is_active
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime|null $update_at
 * @property \Cake\I18n\FrozenTime|null $delete_at
 * @property $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Enrollment[] $enrollments
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'paternal_last_name' => true,
        'maternal_last_name' => true,
        'email' => true,
        'password' => true,
        'is_active' => true,
        'create_at' => true,
        'update_at' => true,
        'delete_at' => true,
        'role_id' => true,
        'role' => true,
        'enrollments' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
