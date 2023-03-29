<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TaskFixture
 */
class TaskFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'task';
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
                'user_id' => 1,
                'assigned_by' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'delete_status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-28 07:34:59',
                'modified_date' => '2023-03-28 07:34:59',
            ],
        ];
        parent::init();
    }
}
