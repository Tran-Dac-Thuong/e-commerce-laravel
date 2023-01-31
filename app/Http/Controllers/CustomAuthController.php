<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CustomAuthController extends Controller
{

    public function home(){
        return view('Auth.home');
    }

    public function indexlogin(){
        return view("Auth.login");
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $credential = $request->only('email', 'password');
        
        if(Auth::attempt($credential, $request->remember)){
            $role = Auth::user()->role;
            if($role == '1'){
                $total_product = Product::all()->count();
                $total_order = Order::all()->count();
                $total_user = User::all()->count();
                $order = Order::all();
                $total_revenue = 0;
                $total_delivery = Order::where('delivery_status', '=', 'Delivered')->get()->count();
                $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

                foreach($order as $order){
                    $total_revenue = $total_revenue + $order->price;
                }

                return view("Admin.home")->with(['total_product'=>$total_product, 'total_order'=>$total_order, 'total_user'=>$total_user, 'total_revenue'=>$total_revenue, 'total_delivery'=>$total_delivery, 'total_processing'=>$total_processing]);
            }else{
                return redirect('/')->with(['message'=>'Login succeed!']);
            }
            
        }
      return redirect('/login')->with('message', 'Incorrect email or password!');
    }

    public function signup(){
        return view("Auth.register");
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'cpassword'=>'required|min:8'
        ]);

        $data = $request->all();
       
        
        $this->createData($data);
        return redirect('/login');
    }

    public function createData(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function forgot(){
        return view("Auth.password.email");
    }

    public function postforgot(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);
        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email'=>$request->email, 'token'=>$token, 'created_at'=>Carbon::now()]
        );

        Mail::send('Auth.password.confirm', ['token'=>$token], function($message) use ($request){
            $message->from($request->email);
            $message->to("hoangdeptraibodoiqua4321@gmail.com");
            $message->subject("Famms Fashion Website");
          
        });
       
        return back()->with(['message'=>'We have send your password reset link. Please check your email']);
    }

    public function resetpassword($token){
        return view("Auth.password.reset", ['token'=>$token]);
    }

    public function postresetpassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required|min:8',
            'confirm'=>'required'
        ]);

        $updatePassword = DB::table("password_resets")->where(['email'=>$request->email, 'token'=>$request->token])->first();
        if(!$updatePassword)
        return back()->withInput()->with('error', 'Invalid token');  
        
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table("password_resets")->where(['email'=>$request->email])->delete();
        return redirect("/login")->with('message_reset', 'Your password has been changed!');
    }
}
