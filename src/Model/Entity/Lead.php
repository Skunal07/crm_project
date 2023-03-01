<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lead Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property float $price
 * @property string|null $work_title
 * @property string $status
 * @property string $stages
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\LeadContact[] $lead_contacts
 */
class Lead extends Entity
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
        'user_id' => true,
        'name' => true,
        'price' => true,
        'work_title' => true,
        'status' => true,
        'stages' => true,
        'created_date' => true,
        'modified_date' => true,
        'user' => true,
        'lead_contacts' => true,
    ];
}
