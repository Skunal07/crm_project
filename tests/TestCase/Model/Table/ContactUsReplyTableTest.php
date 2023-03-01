<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactUsReplyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactUsReplyTable Test Case
 */
class ContactUsReplyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactUsReplyTable
     */
    protected $ContactUsReply;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ContactUsReply',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContactUsReply') ? [] : ['className' => ContactUsReplyTable::class];
        $this->ContactUsReply = $this->getTableLocator()->get('ContactUsReply', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContactUsReply);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContactUsReplyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ContactUsReplyTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
