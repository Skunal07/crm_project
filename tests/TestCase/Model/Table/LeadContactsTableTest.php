<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadContactsTable Test Case
 */
class LeadContactsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadContactsTable
     */
    protected $LeadContacts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LeadContacts',
        'app.Leads',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LeadContacts') ? [] : ['className' => LeadContactsTable::class];
        $this->LeadContacts = $this->getTableLocator()->get('LeadContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LeadContacts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LeadContactsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LeadContactsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
