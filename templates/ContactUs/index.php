<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactU> $contactUs
 */
?>
<div class="contactUs index content">
    <?= $this->Html->link(__('New Contact U'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contact Us') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('query_type') ?></th>
                    <th><?= $this->Paginator->sort('message') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactUs as $contactU): ?>
                <tr>
                    <td><?= $this->Number->format($contactU->id) ?></td>
                    <td><?= h($contactU->name) ?></td>
                    <td><?= h($contactU->email) ?></td>
                    <td><?= h($contactU->phone) ?></td>
                    <td><?= h($contactU->query_type) ?></td>
                    <td><?= h($contactU->message) ?></td>
                    <td><?= h($contactU->status) ?></td>
                    <td><?= h($contactU->created_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactU->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactU->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactU->id)]) ?>
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
