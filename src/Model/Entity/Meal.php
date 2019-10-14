<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meal Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_meal
 * @property int $cost_meal
 * @property string $other_details
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MenuItem[] $menu_items
 */
class Meal extends Entity
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
        'user_id' => true,
        'date_meal' => true,
        'cost_meal' => true,
        'other_details' => true,
        'user' => true,
        'menu_items' => true
    ];
}
