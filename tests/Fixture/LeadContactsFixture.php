<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LeadContactsFixture
 */
class LeadContactsFixture extends TestFixture
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
                'lead_id' => 1,
                'contact' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-03-01 06:08:35',
            ],
        ];
        parent::init();
    }
}
