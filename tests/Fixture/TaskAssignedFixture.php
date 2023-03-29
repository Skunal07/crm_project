<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TaskAssignedFixture
 */
class TaskAssignedFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'task_assigned';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'task_id' => 1,
                'task_name' => 'Lorem ipsum dolor sit amet',
                'due_date' => '2023-03-28 07:35:08',
                'create_at' => '2023-03-28 07:35:08',
            ],
        ];
        parent::init();
    }
}
