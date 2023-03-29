<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskAssignedTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskAssignedTable Test Case
 */
class TaskAssignedTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskAssignedTable
     */
    protected $TaskAssigned;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TaskAssigned',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TaskAssigned') ? [] : ['className' => TaskAssignedTable::class];
        $this->TaskAssigned = $this->getTableLocator()->get('TaskAssigned', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TaskAssigned);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TaskAssignedTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
