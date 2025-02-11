<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 * @property int $is_enabled
 * @property \Cake\I18n\FrozenTime $create_at
 * @property \Cake\I18n\FrozenTime|null $delete_at
 *
 * @property \App\Model\Entity\Enrollment[] $enrollments
 */
class Course extends Entity
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
        'description' => true,
        'start_date' => true,
        'end_date' => true,
        'is_enabled' => true,
        'create_at' => true,
        'delete_at' => true,
        'enrollments' => true,
    ];


    /**
     * Save create_at in Chile time zone
     */
    protected function _setCreateAt( $value )
    {
        date_default_timezone_set('America/Santiago');
        return date("Y-m-d H:i:s");
    }
}
