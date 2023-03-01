<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $email
 * @property string $password
 * @property int|null $added_by
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\ContactUsReply[] $contact_us_reply
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Lead[] $leads
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\UserProfile[] $user_profile
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'added_by' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'users' => true,
        'categories' => true,
        'companies' => true,
        'contact_us_reply' => true,
        'contacts' => true,
        'leads' => true,
        'products' => true,
        'user_profile' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
