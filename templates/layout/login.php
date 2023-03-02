<?= $this->element('dashboard/header'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?= $this->element('/dashboard/footer'); ?>