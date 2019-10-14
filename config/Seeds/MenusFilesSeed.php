<?php
use Migrations\AbstractSeed;

/**
 * MenusFiles seed.
 */
class MenusFilesSeed extends AbstractSeed
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
                'menu_id' => '3',
                'file_id' => '5',
            ],
            [
                'id' => '2',
                'menu_id' => '1',
                'file_id' => '6',
            ],
        ];

        $table = $this->table('menus_files');
        $table->insert($data)->save();
    }
}
