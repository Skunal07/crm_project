<?php

use Cake\Core\Configure;
echo Configure::read('DATE_YMD'); ?>
<?= $this->element('/main/main_header'); ?>
<?= $this->element('/main/main_sidebar'); ?>
<?= $this->element('/main/main_nav'); ?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<?= $this->element('/main/main_footer'); ?>
