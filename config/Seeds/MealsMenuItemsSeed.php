<?php
use Migrations\AbstractSeed;

/**
 * MealsMenuItems seed.
 */
class MealsMenuItemsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'meal_id' => '1',
                'menu_item_id' => '2',
                'quantity' => '1',
            ],
        ];

        $table = $this->table('meals_menu_items');
        $table->insert($data)->save();
    }
}
