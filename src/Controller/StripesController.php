<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Stripe;

class StripesController extends AppController
{



    public function stripe()
    {
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function payment()
    {
        // require_once VENDOR_PATH . '/stripe/stripe-php/init.php';

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" => 1 * 100,
            "currency" => "usd",
            // "customer" => 'default',
            "source" => $_REQUEST["stripeToken"],
            "description" => "Payment To DoorsDekho.com"
        ]);
        // dd($stripe);
        // after successfull payment, you can store payment related information into your database
        $this->Flash->success(__('Payment done successfully'));

        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }
    // public function payment()
    // {
    //     if ($_POST['tokenId']) {
    //         require_once('vendor/autoload.php');
    //         //stripe secret key or revoke key
    //         // $stripeSecret = 'sk_test_51MlWovDaRK6l3iOSSI1rKkfCpvsgOTrDPhJ7VL9IxCx02RueLdIGbyucVzR4U2LNDEJGfvMn3YL35oNdSK6vQRal00aOl6gSLJ';
    //         // See your keys here: https://dashboard.stripe.com/account/apikeys
    //         \Stripe\Stripe::setApiKey(STRIPE_SECRET);
    //         // Get the payment token ID submitted by the form:
    //         $token = $_POST['tokenId'];
    //         dd($token);
    //         // Charge the user's card:
    //         $charge = \Stripe\Charge::create(array(
    //             "amount" => $_POST['amount'],
    //             "currency" => "usd",
    //             "description" => "stripe integration in PHP with source code - Rahul_Kumar.com",
    //             "source" => $token,
    //         ));
    //         // after successfull payment, you can store payment related information into your database
    //         $data = array('success' => true, 'data' => $charge);
    //         $my = array();
    //         $my['currency'] = $data['data']['currency'];
    //         $my['amount'] = $data['data']['amount'];
    //         $my['amount_captured'] = $data['data']['amount_captured'];
    //         $my['status'] = $data['data']['status'];
    //         $my['car_id'] = $_POST['carId'];
    //         $my['user_id'] = $_POST['userId'];
    //         $my['transaction_id'] = $data['data']['id'];
    //         $transaction = $this->Transactions->newEmptyEntity();
    //         $transaction = $this->Transactions->patchEntity($transaction, $my);
    //         if ($this->Payment->save($transaction)) {
    //             echo json_encode($data);
    //             exit;
    //         }
    //         echo json_encode($data);
    //         exit;
    //     }
    // }
}
