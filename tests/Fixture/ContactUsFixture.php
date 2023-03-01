<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactUsFixture
 */
class ContactUsFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'contact_us';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ip',
                'query_type' => 'Lorem ipsum dolor sit amet',
                'message' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-01 06:07:30',
            ],
        ];
        parent::init();
    }
}
