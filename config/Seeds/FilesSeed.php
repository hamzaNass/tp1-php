<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '5',
                'name' => '34284632-bolognaise-des-spaghettis-avec-de-la-salade-fraîche.jpg',
                'path' => 'Files/',
                'created' => '2019-10-08 23:01:44',
                'modified' => '2019-10-08 23:01:44',
                'status' => '1',
            ],
            [
                'id' => '6',
                'name' => 'burger-frites.jpg',
                'path' => 'Files/',
                'created' => '2019-10-08 23:02:46',
                'modified' => '2019-10-08 23:02:46',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
