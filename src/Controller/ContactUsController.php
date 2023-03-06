<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;
use App\Controller\View;
/**
 * ContactUs Controller
 *
 * @property \App\Model\Table\ContactUsTable $ContactUs
 * @method \App\Model\Entity\ContactU[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactUsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        $this->loadComponent('Authentication.Authentication');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('ContactUs');
        $this->loadModel('UserProfile');
        $this->loadModel('Users');
        $contactus=$this->ContactUs->find('all')->where(['notification'=>2 ,'delete_status'=> 0]);
        $i=0;
        foreach($contactus as $a){
            $i++;
        }
        $count=$i;
        $result = $this->Authentication->getIdentity();
        $uid=$result->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);
        $this->set(compact('contactus', 'count','user'));
       
    }
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('Users');
    }
    public function index()
    {
        $contactUs = $this->paginate($this->ContactUs);

        $this->set(compact('contactUs'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact U id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactU = $this->ContactUs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contactU'));
    }

    // ===============================================================================================
    public function response($id = null)
    {
        $this->request->allowMethod(['post']);
        $contact = $this->ContactUs->get($id);
        $contact->work_status = 1;
        $email=$contact->email;
        $name=$contact->name;

        if ($this->ContactUs->save($contact)) {
            $mailer = new Mailer('default');
            $mailer->setTransport('gmail'); //your email configuration name
            $mailer->setFrom(['kunal02chd@gmail.com' => 'Code The Pixel']);
            $mailer->setTo($email);
            $mailer->setEmailFormat('html');
            $mailer->setSubject('Team DoorDekho.com');
            $mailer->deliver("<h3>hello Mr/Mrs $name .</h3>
            <p>I hope this email finds you well.</p>
            <p>Thank you for contacting with us. your Quate has been approval. I'd love to schedule a meeting with you to learn more about your organization and its current strategies</p>
            <p>Here are some dates and times that may work for our schedules</p>
            <ul>
            <li>date and time</li>
            <li>date and time</li>
            <li>date and time</li>
            </ul>
            ");
            echo json_encode(array(
                "status" => 1,
                "message" => 'this message has been send',
            ));
            exit;
        }
    }
    public function reject($id = null)
    {
        $this->request->allowMethod(['post']);
        $contact = $this->ContactUs->get($id);
            $contact->work_status = 2;
            $email=$contact->email;
            $name=$contact->name;

        if ($this->ContactUs->save($contact)) {
            $mailer = new Mailer('default');
            $mailer->setTransport('gmail'); //your email configuration name
            $mailer->setFrom(['kunal02chd@gmail.com' => 'Code The Pixel']);
            $mailer->setTo($email);
            $mailer->setEmailFormat('html');
            $mailer->setSubject('Team DoorDekho.com');
            $mailer->deliver("<h3>hello Mr/Mrs $name .</h3>
            <p>I hope this email finds you well.</p>
            <p>I’m sorry to hear that your project has been cancelled. I’m sure we’ll find a way to work together again in the future.</p>
            <p>Please let me know if there’s anything else I can help you .</p><p>For New Update please  <a href='http://localhost:8765/users'>click here</a>.</p>
            ");
            echo json_encode(array(
                "status" => 1,
                "message" => 'this message has been send',
            ));
            exit;
        }
    }
    public function deleteContactus($id = null)
    {
        $this->request->allowMethod(['post']);
        $contact = $this->ContactUs->get($id);
            $contact->delete_status = 1;

        if ($this->ContactUs->save($contact)) {
            echo json_encode(array(
                "status" => 1,
                "message" => 'this message has been send',
            ));
            exit;
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactU = $this->ContactUs->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->getData());
            if ($this->ContactUs->save($contactU)) {
                $this->Flash->success(__('The contact u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact u could not be saved. Please, try again.'));
        }
        $this->set(compact('contactU'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact U id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactU = $this->ContactUs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->getData());
            if ($this->ContactUs->save($contactU)) {
                $this->Flash->success(__('The contact u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact u could not be saved. Please, try again.'));
        }
        $this->set(compact('contactU'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact U id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactU = $this->ContactUs->get($id);
        if ($this->ContactUs->delete($contactU)) {
            $this->Flash->success(__('The contact u has been deleted.'));
        } else {
            $this->Flash->error(__('The contact u could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
