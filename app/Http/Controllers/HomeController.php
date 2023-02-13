<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype==0){
            $products = Product::paginate(6);
            return view("home.userpage",compact('products'));
        }else{
            return view("admin.home");
        }
    }

    public function index(){
        $products = Product::paginate(6);
        return view("home.userpage",compact('products'));
    }

    public function product_details($id){
        $product = Product::find($id);
        return view("home.product_details",compact('product'));
    }

    public function add_cart(Request $request , $id){
        if(Auth::id()){

            $user = Auth::user();
            $product = Product::find($id);
            
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->products_title = $product->title;
            if($product->descount_price!=null){
                $cart->price = $product->descount_price * $request->quantity;
            }else{
                $cart->price = $product->price * $request->quantity;
            }
            
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();

        }
        else{

            return redirect('login');

        }
    }


    public function show_cart(){
        $id = Auth::user()->id;

        $carts = Cart::where('user_id','=',$id)->get();

        return view("home.show_cart",compact('carts'));
    }

    public function remove_cart($id){

        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id','=',$userid)->get();

        foreach ($data as $data) {
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->products_title = $data->products_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = "cash on delivery";
            $order->delivery_status = "processing";
            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with("message","We have recieved your order. We will connect with you soon.");
    }



}
