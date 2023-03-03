<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LeadContact Entity
 *
 * @property int $id
 * @property int $lead_id
 * @property string $contact
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Lead $lead
 */
class LeadContact extends Entity
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
        // 'contact' => true,
        // 'created_date' => true,
        // 'lead' => true,
    ];
}
