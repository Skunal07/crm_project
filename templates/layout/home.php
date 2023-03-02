<?= $this->element('/main/main_header'); ?>
<?= $this->element('/main/main_nav'); ?>
<?= $this->element('/main/main_sidebar'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?= $this->element('/main/main_footer'); ?>