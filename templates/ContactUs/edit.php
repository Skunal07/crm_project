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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactU->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactU->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contact Us'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactUs form content">
            <?= $this->Form->create($contactU) ?>
            <fieldset>
                <legend><?= __('Edit Contact U') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('query_type');
                    echo $this->Form->control('message');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
