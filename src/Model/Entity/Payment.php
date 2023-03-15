<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $contact_us_id
 * @property string $transaction_id
 * @property string $status
 * @property float|null $priority
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\ContactU $contact_u
 */
class Payment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        '*' => true,
        // 'contact_us_id' => true,
        // 'transaction_id' => true,
        // 'status' => true,
        // 'priority' => true,
        // 'created_date' => true,
        // 'contact_u' => true,
    ];
}
