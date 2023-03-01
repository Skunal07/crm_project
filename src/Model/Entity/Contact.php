<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property int|null $company_id
 * @property int $user_id
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $status
 * @property \Cake\I18n\FrozenTime $create_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\User $user
 */
class Contact extends Entity
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
        'company_id' => true,
        'user_id' => true,
        'address' => true,
        'email' => true,
        'phone' => true,
        'status' => true,
        'create_date' => true,
        'modified_date' => true,
        'company' => true,
        'user' => true,
    ];
}
