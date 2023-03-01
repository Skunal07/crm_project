<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactU $contactU
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contact U'), ['action' => 'edit', $contactU->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contact U'), ['action' => 'delete', $contactU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactU->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contact Us'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contact U'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactUs view content">
            <h3><?= h($contactU->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($contactU->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactU->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($contactU->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Query Type') ?></th>
                    <td><?= h($contactU->query_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message') ?></th>
                    <td><?= h($contactU->message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($contactU->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contactU->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($contactU->created_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
