<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealsMenuItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealsMenuItemsTable Test Case
 */
class MealsMenuItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MealsMenuItemsTable
     */
    public $MealsMenuItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MealsMenuItems',
        'app.Meals',
        'app.MenuItems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MealsMenuItems') ? [] : ['className' => MealsMenuItemsTable::class];
        $this->MealsMenuItems = TableRegistry::getTableLocator()->get('MealsMenuItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealsMenuItems);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
