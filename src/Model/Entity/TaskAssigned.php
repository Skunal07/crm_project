<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaskAssigned Entity
 *
 * @property int $id
 * @property int|null $task_id
 * @property string|null $task_name
 * @property \Cake\I18n\FrozenTime|null $due_date
 * @property \Cake\I18n\FrozenTime $create_at
 */
class TaskAssigned extends Entity
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
        '*'=>true,
        // 'task_id' => true,
        // 'task_name' => true,
        // 'due_date' => true,
        // 'create_at' => true,
    ];
}
