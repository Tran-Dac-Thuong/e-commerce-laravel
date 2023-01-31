<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
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
    }

    public function view_product(){
        $category = Category::all();
        return view("Admin.product")->with(["category"=>$category]);
    }

    public function post_product(Request $request){
        $input = $request->all();
        $filename = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $filename, 'public');
        $input['image'] = '/storage/'.$path;
        Product::create($input);
        return redirect()->back()->with('message', 'Add new product succeed!');
    }

    public function show_product(){
        $product = DB::table("products")->paginate(5);
        //$product = Product::all();
        return view("Admin.show_product")->with(["product"=>$product]);
    }

    public function view_category(){
        $category = DB::table("categories")->paginate(5);
        //$category = Category::all();
        return view("Admin.category")->with(["category"=>$category]);
    }
    public function post_category(Request $request){
        $input = $request->all();
        Category::create($input);
        return redirect()->back()->with('message', 'Add new category succeed!');
    }

    public function delete_category($id){
        Category::destroy($id);
        return redirect()->back()->with('message', 'Delete category succeed!');
    }

    public function delete_product($id){
        Product::destroy($id);
        return redirect()->back()->with('message', 'Delete product succeed!');
    }

    public function update_product($id){
        $product = Product::find($id);
        $category = Category::all();
        return view("Admin.update")->with(["product"=>$product, "category"=>$category]);
    }

    public function save_change_product(Request $request, $id){
        $product = Product::find($id);
        $input = $request->all();
        $image = $request->image;
        if($image != ""){
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $filename, 'public');
            $input['image'] = '/storage/'.$path;
        }
      
        $product->update($input);
        return redirect()->back()->with('message', 'Update product succeed!');
    }

    public function view_order(){
        $order = DB::table("orders")->paginate(4);
        //$order = Order::all();
        return view("Admin.order")->with(["order"=>$order]);
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";
        $order->save();
        return redirect()->back();
    }

    public function print_PDF($id){
        $order = Order::find($id);
        $data = ['order'=>$order];
        $pdf = Pdf::loadView('Admin.pdf', $data);
        $today = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$today.'.pdf');
    }

    public function search_data(Request $request){
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();
        return view("Admin.order", compact('order'));
    }
}
