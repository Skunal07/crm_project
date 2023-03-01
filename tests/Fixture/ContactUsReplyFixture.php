<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactUsReplyFixture
 */
class ContactUsReplyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'contact_us_reply';
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
                'subject' => 'Lorem ipsum dolor sit amet',
                'message' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-01 06:08:11',
            ],
        ];
        parent::init();
    }
}
