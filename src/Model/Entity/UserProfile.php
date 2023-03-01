<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $contact
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 * @property string|null $profile_image
 *
 * @property \App\Model\Entity\User $user
 */
class UserProfile extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'address' => true,
        'contact' => true,
        'created_date' => true,
        'modified_date' => true,
        'profile_image' => true,
        'user' => true,
    ];
}
