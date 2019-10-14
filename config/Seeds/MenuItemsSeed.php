<?php
use Migrations\AbstractSeed;

/**
 * MenuItems seed.
 */
class MenuItemsSeed extends AbstractSeed
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
                'id' => '1',
                'menu_id' => '1',
                'menu_item_name' => 'trio spaghetti',
                'other_details' => 'spaghetti avec salade et boisson',
            ],
            [
                'id' => '2',
                'menu_id' => '3',
                'menu_item_name' => 'trio hamburger',
                'other_details' => 'hamburger avec frite',
            ],
        ];

        $table = $this->table('menu_items');
        $table->insert($data)->save();
    }
}
