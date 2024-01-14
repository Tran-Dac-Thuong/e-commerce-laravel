<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class PaypalController extends Controller
{


    private $gateway;
  
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    public function charge(Request $request, $totalprice)
    {
      
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $totalprice,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();
           
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        
    }
  
    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
          
            if ($response->isSuccessful())
            {
               

                $user = Auth::user();
                $user_id = $user->id;
                $data = Cart::where("user_id", "=", $user_id)->get();

                foreach($data as $data){
                    $order = new Order();
        
                    $order->name = $data->name;
                    $order->email = $data->email;
                    $order->user_id = $data->user_id;
                    $order->product_title = $data->product_title;
                    $order->price = $data->price;
                    $order->quantity = $data->quantity;
                    $order->image = $data->image;
                    $order->product_id = $data->product_id;
                    $order->payment_status = 'Paid';
                    $order->delivery_status = 'processing';
        
                    $order->save();
        
                    $cart_id = $data->id;
                    $cart = Cart::find($cart_id);
                    $cart->delete();
                }

                return view("home.success");
            } else {
                return $response->getMessage();
            }
        } else {
            // return 'Transaction is declined';
            return view("home.error");
        }
    }
  
    /**
     * Error Handling.
     */
    public function error()
    {
        // return 'User cancelled the payment.';
        return view('home.index');
    }
}
