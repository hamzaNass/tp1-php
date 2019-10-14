<?php
use Migrations\AbstractSeed;

/**
 * Meals seed.
 */
class MealsSeed extends AbstractSeed
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
                'user_id' => '3',
                'date_meal' => '2019-10-09',
                'cost_meal' => '15',
                'other_details' => 'trio numero 1 avec poutine ',
            ],
        ];

        $table = $this->table('meals');
        $table->insert($data)->save();
    }
}
