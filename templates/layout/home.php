<?= $this->element('dashborad/header'); ?>
<?= $this->element('dashborad/nav'); ?>
<?= $this->element('dashborad/sidebar'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?= $this->element('dashborad/footer'); ?>