<?= $this->element('/dashbord/header'); ?>
<?= $this->element('/dashbord/sidebar'); ?>
<?= $this->element('/dashbord/nav'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?= $this->element('/dashbord/footer'); ?>