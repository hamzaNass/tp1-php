<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '3',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$7WlPARHrjjrIUKyAZV4ID.5THgNgnQWn0R/3gkLk904Dzfgxg1mCG',
                'created' => '2019-09-25 21:00:38',
                'modified' => '2019-09-25 21:00:38',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
