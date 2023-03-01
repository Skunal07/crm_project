<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lead> $leads
 */
?>
<div class="leads index content">
    <?= $this->Html->link(__('New Lead'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Leads') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('work_title') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('stages') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leads as $lead): ?>
                <tr>
                    <td><?= $this->Number->format($lead->id) ?></td>
                    <td><?= $lead->has('user') ? $this->Html->link($lead->user->id, ['controller' => 'Users', 'action' => 'view', $lead->user->id]) : '' ?></td>
                    <td><?= h($lead->name) ?></td>
                    <td><?= $this->Number->format($lead->price) ?></td>
                    <td><?= h($lead->work_title) ?></td>
                    <td><?= h($lead->status) ?></td>
                    <td><?= h($lead->stages) ?></td>
                    <td><?= h($lead->created_date) ?></td>
                    <td><?= h($lead->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lead->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lead->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lead->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
