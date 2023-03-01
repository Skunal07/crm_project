<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactUsReply Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $subject
 * @property string $message
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\User $user
 */
class ContactUsReply extends Entity
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
        'subject' => true,
        'message' => true,
        'created_date' => true,
        'user' => true,
    ];
}
