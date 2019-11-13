<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealstypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealstypeTable Test Case
 */
class MealstypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MealstypeTable
     */
    public $Mealstype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Mealstype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Mealstype') ? [] : ['className' => MealstypeTable::class];
        $this->Mealstype = TableRegistry::getTableLocator()->get('Mealstype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mealstype);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
