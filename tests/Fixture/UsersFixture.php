<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'added_by' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-01 06:03:10',
                'modified_date' => '2023-03-01 06:03:10',
            ],
        ];
        parent::init();
    }
}
