<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealsMenuItemsFixture
 */
class MealsMenuItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'meal_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'menu_item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'menu_item_id' => ['type' => 'index', 'columns' => ['menu_item_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['meal_id', 'menu_item_id'], 'length' => []],
            'meals_menu_items_ibfk_1' => ['type' => 'foreign', 'columns' => ['meal_id'], 'references' => ['meals', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'meals_menu_items_ibfk_2' => ['type' => 'foreign', 'columns' => ['menu_item_id'], 'references' => ['menu_items', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'meal_id' => 1,
                'menu_item_id' => 1,
                'quantity' => 1
            ],
        ];
        parent::init();
    }
}
