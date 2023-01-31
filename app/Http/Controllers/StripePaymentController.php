<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe;

class StripePaymentController extends Controller
{
    public function payment_stripe($totalprice){
        $id = Auth::user()->id;
        $cart_count = Cart::where("user_id", "=", $id)->get()->count();
        return view("home.stripe")->with(['totalprice'=>$totalprice, 'cart_count'=>$cart_count]);
    }

    public function post_payment_stripe(Request $request, $totalprice){
           
            $stripe = Stripe::setApiKey(env("STRIPE_SECRET"));

            try {
                $token = $stripe->tokens()->create([
                    'card'=>[
                        'number'=> $request->get('card_number'),
                        'exp_month'=> $request->get('expiration_month'),
                        'exp_year'=> $request->get('expiration_year'),
                        'cvc'=> $request->get('cvv'),
                    ],
                ]);

                if(!isset($token['id'])){
                    return redirect()->back();
                }

                $charge = $stripe->charges()->create([
                    'card'=>$token['id'],
                    'currency'=>'USD',
                    'amount'=>$totalprice * 100,
                    'description'=>'Thanks for payment',
                ]);

                if($charge['status'] == 'succeeded'){

                    $user = Auth::user();
                    $user_id = $user->id;
                    $data = Cart::where("user_id", "=", $user_id)->get();

                    foreach($data as $data){
                        $order = new Order();
            
                        $order->name = $data->name;
                        $order->email = $data->email;
                        $order->user_id = $data->id;
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

                    return redirect()->back()->with('message', 'Payment succeed!');
                   
                }else{
                    return redirect()->back()->with('err_message', 'Money not add in wallet!');
                }

            } catch (Exception $e) {
                return redirect()->route("paymentstripe")->with('error', $e->getMessage());
            }catch(\Cartalyst\Stripe\Exception\CardErrorException $e){
                return redirect()->route("paymentstripe")->with('error', $e->getMessage());
            }catch(\Cartalyst\Stripe\Exception\MissingParameterException $e){
                return redirect()->route("paymentstripe")->with('error', $e->getMessage());
            }
    }
}
