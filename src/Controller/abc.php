<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;

class UsersController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->viewBuilder()->setLayout("home");
    }

    public function dashbord()
    {
        $this->viewBuilder()->setLayout("dashbord");
    }
}
