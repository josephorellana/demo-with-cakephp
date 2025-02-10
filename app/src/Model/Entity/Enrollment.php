<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enrollment Entity
 *
 * @property $id
 * @property \Cake\I18n\FrozenTime $create_at
 * @property $user_id
 * @property $course_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Course $course
 */
class Enrollment extends Entity
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
        'create_at' => true,
        'user_id' => true,
        'course_id' => true,
        'user' => true,
        'course' => true,
    ];
}
