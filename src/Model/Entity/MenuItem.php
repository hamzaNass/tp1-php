<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuItem Entity
 *
 * @property int $id
 * @property int $menu_id
 * @property string $menu_item_name
 * @property string $other_details
 *
 * @property \App\Model\Entity\Menu $menu
 * @property \App\Model\Entity\Meal[] $meals
 */
class MenuItem extends Entity
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
        'menu_id' => true,
        'menu_item_name' => true,
        'other_details' => true,
        'menu' => true,
        'meals' => true
    ];
}
