<?= $this->element('/main/main_header'); ?>
<?= $this->element('/main/main_nav'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>