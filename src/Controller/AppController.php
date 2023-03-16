<?php

declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadComponent('Authentication.Authentication');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('ContactUs');
        $this->loadModel('Contacts');
        $this->loadModel('UserProfile');
        $this->loadModel('Users');
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('LeadContacts');
        $this->loadModel('Leads');
        $this->loadModel('Companies');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Payments');
        $contactus = $this->ContactUs->find('all')->where(['notification' => 2, 'delete_status' => 0]);
        $i = 0;
        foreach ($contactus as $a) {
            $i++;
        }
        $count = $i;
        if ($this->Authentication->getIdentity() != null) {
            $result = $this->Authentication->getIdentity();
            $uid = $result->id;
            $user = $this->Users->get($uid, [
                'contain' => ['UserProfile']
            ]);
            $this->set(compact('contactus', 'count', 'user'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        $this->Authentication->addUnauthenticatedActions(['index', 'viewproduct', 'about', 'contact', 'stripe', 'payment']);
    }
}
