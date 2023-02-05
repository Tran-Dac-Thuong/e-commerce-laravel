<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $product = DB::table("products")->paginate(6);
        if(Auth::user()){
            $product = DB::table("products")->paginate(6);
            $id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view('home.index')->with(["product"=>$product, "cart_count"=>$cart_count]);
        }
      
        // $product = Product::all();
        
        return view('home.index')->with(["product"=>$product]);
    }

    public function detail_product($id){
        if(Auth::id()){
            $product = Product::find($id);
            $user_id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $user_id)->get()->count();
            return view("home.detail")->with(['product'=>$product, 'cart_count'=>$cart_count]);
        }else{
            return redirect("login");
        }
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where("product_id", "=", $id)->where("user_id", "=", $user_id)->get('id')->first();

            if($product_exist_id != null){
                $cart = Cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price != null){
                    $cart->price = $product->discount_price * $cart->quantity;
                }else{
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success("Add to cart successfully", "We have added the product to the cart");
                return redirect()->back();
                // return redirect()->back()->with("toast_message", "We have added the product to the cart. Please check your cart");
            }else{
                $cart = new Cart;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;

                if($product->discount_price != null){
                    $cart->price = $product->discount_price * $request->quantity;
                }else{
                    $cart->price = $product->price * $request->quantity;
                }
                
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->save();

                Alert::success("Add to cart successfully", "We have added the product to the cart");
                // return redirect()->back()->with("toast_message", "We have added the product to the cart. Please check your cart");
    
                return redirect()->back();
            }

           
            
        }else{
            return redirect("login");
        }
    }

    public function show_cart(){
        
        if(Auth::id()){
            
            $id = Auth::user()->id;
            $cart = Cart::where("user_id", "=", $id)->paginate(3);
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view("home.show_cart")->with(["cart"=>$cart, "cart_count"=>$cart_count]);
        }else{
            return redirect("login");
        }
      
    }

    public function delete_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        Alert::success("Delete product successfully", "We have removed the product from the cart");
        return redirect()->back();
    }

    public function cash_order(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where("user_id", "=", $user_id)->get();
        foreach($data as $data){
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        Alert::success("We have received your order", "We will contact you soon...");
        return redirect()->back();
    }

    public function show_order(){
        if(Auth::id()){
            $user = Auth::user();
            $user_id = $user->id;
            $order = Order::where("user_id", "=", $user_id)->paginate(4);
            $cart_count = Cart::where("user_id", "=", $user_id)->get()->count();
            return view("home.order")->with(['order'=>$order, 'cart_count'=>$cart_count]);
        }else{
            return redirect("login");
        }
    }

    public function cancel_order($id){
        $order = Order::find($id);
        $order->delivery_status = "Order canceled";
        $order->save();
        Alert::success("Cancel order successfully", "We have cancel your order");
        return redirect()->back();
    }
  
    public function product_page(){
        if(Auth::id()){    
            $id = Auth::user()->id;
            $product = DB::table("products")->paginate(6);
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view("home.product")->with(["product"=>$product, "cart_count"=>$cart_count]);
        }else{
            return redirect("login");
        }
    }

    public function search_product(Request $request){
        $id = Auth::user()->id;
        $cart_count = Cart::where("user_id", "=", $id)->get()->count();
        $searchText = $request->search;
        $product = Product::where('title', 'LIKE', "%$searchText%")->paginate(6);
        return view("home.product")->with(['product'=>$product, 'cart_count'=>$cart_count]);
    }

    public function about_page(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view('home.about')->with(["cart_count"=>$cart_count]);
        }
        return view("home.about");
    }

    public function testimonial_page(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view('home.testimonial')->with(["cart_count"=>$cart_count]);
        }
        return view("home.testimonial");
    }

    public function blog_page(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
            return view('home.blog')->with(["cart_count"=>$cart_count]);
        }
        return view("home.blog");
    }

    public function contact_page(){
        if(Auth::user()){
            $id = Auth::user()->id;
            $cart_count = Cart::where("user_id", "=", $id)->get()->count();
           
            return view('home.contact')->with(["cart_count"=>$cart_count]);
        }
        return view("home.contact");
    }

    public function discount_offer(){
        Alert::success("You have successfully registered", "You will get a discount when you buy our products");
        return redirect()->back();
    }

    public function send_contact_email(Request $request){
       
        Alert::success("Email sent successfully", "We will respond to you as soon as possible");
        return redirect()->back();
    }
}
