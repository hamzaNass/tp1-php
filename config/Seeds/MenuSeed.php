<?php
use Migrations\AbstractSeed;

/**
 * Menu seed.
 */
class MenuSeed extends AbstractSeed
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
                'menu_id' => '1',
                'menu_name' => 'trio numero 1',
                'date_from' => '2019-09-25',
                'date_to' => '2024-09-25',
                'other_details' => 'Remplacer par une poutine pour 2$',
            ],
            [
                'menu_id' => '3',
                'menu_name' => 'trio numéro 2',
                'date_from' => '2019-09-25',
                'date_to' => '2024-09-25',
                'other_details' => 'Rajouter une boisson pour 1$',
            ],
        ];

        $table = $this->table('menus');
        $table->insert($data)->save();
    }
}
