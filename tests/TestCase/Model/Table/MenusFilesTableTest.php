<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenusFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenusFilesTable Test Case
 */
class MenusFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenusFilesTable
     */
    public $MenusFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MenusFiles',
        'app.Menus',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MenusFiles') ? [] : ['className' => MenusFilesTable::class];
        $this->MenusFiles = TableRegistry::getTableLocator()->get('MenusFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenusFiles);

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
