<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lead $lead
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lead'), ['action' => 'edit', $lead->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lead'), ['action' => 'delete', $lead->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lead->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Leads'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lead'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="leads view content">
            <h3><?= h($lead->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $lead->has('user') ? $this->Html->link($lead->user->id, ['controller' => 'Users', 'action' => 'view', $lead->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($lead->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Work Title') ?></th>
                    <td><?= h($lead->work_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($lead->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stages') ?></th>
                    <td><?= h($lead->stages) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lead->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($lead->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($lead->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($lead->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lead Contacts') ?></h4>
                <?php if (!empty($lead->lead_contacts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Lead Id') ?></th>
                            <th><?= __('Contact') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($lead->lead_contacts as $leadContacts) : ?>
                        <tr>
                            <td><?= h($leadContacts->id) ?></td>
                            <td><?= h($leadContacts->lead_id) ?></td>
                            <td><?= h($leadContacts->contact) ?></td>
                            <td><?= h($leadContacts->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'LeadContacts', 'action' => 'view', $leadContacts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'LeadContacts', 'action' => 'edit', $leadContacts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LeadContacts', 'action' => 'delete', $leadContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leadContacts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
