<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProfileFixture
 */
class UserProfileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_profile';
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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'contact' => 'Lorem ip',
                'created_date' => '2023-03-01 06:03:22',
                'modified_date' => '2023-03-01 06:03:22',
                'profile_image' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
