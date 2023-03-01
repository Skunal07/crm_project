<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LeadsFixture
 */
class LeadsFixture extends TestFixture
{
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
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'work_title' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'stages' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-01 06:08:22',
                'modified_date' => '2023-03-01 06:08:22',
            ],
        ];
        parent::init();
    }
}
