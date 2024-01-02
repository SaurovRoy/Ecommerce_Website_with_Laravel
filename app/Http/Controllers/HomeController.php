<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product = product::latest()->paginate(6);
        return view('user.home', compact('product'));
    }


    public function redirects()
    {
        $data=order::all();
        $total_product=product::all()->count();
        $total_order=order::all()->count();
        $total_user=user::all()->count();
        $total_price=0;
        $total_delivary=order::where('delivary_staus','=','delivered')->get()->count();
        $total_payment=order::where('delivary_staus','=','proceessing')->get()->count();
        foreach($data as $order){
            $total_price=$total_price+$order->price;
        }
        $usertype = Auth::user()->usertype;
        if ($usertype == '1' && $usertype = !null) {
            return view('admin.home',compact('data','total_product','total_order',
        'total_user','total_price','total_delivary','total_payment'));
        } else {
            $product = product::latest()->paginate(6);
            return view('user.home', compact('product'));
        }
    }
    public function productDetails($id)
    {
        $product = product::find($id);
        return view('user.productDetails', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {

        if (Auth::id()) {
            $user = Auth::user();
            $product = product::find($id);
            $cart = new cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->address = $user->adress;
            // $cart->phone = $user->phone;
            $cart->product_title = $product->title;
            if ($product->discount_price == null) {
                $cart->price = $product->price * $request->quantity;
            } else {
                $cart->price = $product->discount_price * $request->quantity;
            }

            $cart->quantity = $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function show_cart(){
        
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            $cart1=cart::all();
            $totalprice=0;
            foreach($cart1 as $cart1){
                $totalprice=$totalprice+$cart1->price;
            }
        return view('user.show_cart',compact('cart','totalprice'));
        }
        else{
            return redirect('login');
        }
        
    }
    public function delete_cart($id){
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
    public function cash_order(){
        $user=Auth::user();
        $user_id=$user->id;
        $cart=cart::where('user_id','=',$user_id)->get();
        foreach($cart as $cart){
            $order=new order();
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->adress=$cart->address;
            $order->user_id=$cart->user_id;
            $order->product_title=$cart->product_title;
            $order->quantity=$cart->quantity;
            $order->price=$cart->price;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->payment_status='UnPaid';
            $order->delivary_staus='proceessing';
            $order->save();
            
            $cart_id=$cart->id;
            $cart_delete=cart::find($cart_id);
            $cart_delete->delete();
        }
        return redirect()->back()->with('message','We Have received Your orders and we will contact with you soon....');
    }

    public function stripe($totalprice){
       
        return view('user.stripe',compact('totalprice'));
    }
    
    public function stripePost(Request $request,$totalprice){
       
    
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        
    
            Stripe\Charge::create ([
    
                    "amount" => $totalprice * 100,
    
                    "currency" => "usd",
    
                    "source" => $request->stripeToken,
    
                    "description" => "Rs Saurav It LTD" 
    
            ]);
            $user=Auth::user();
            $user_id=$user->id;
            $cart=cart::where('user_id','=',$user_id)->get();
            foreach($cart as $cart){
                $order=new order();
                $order->name=$cart->name;
                $order->email=$cart->email;
                $order->adress=$cart->address;
                $order->user_id=$cart->user_id;
                $order->product_title=$cart->product_title;
                $order->quantity=$cart->quantity;
                $order->price=$cart->price;
                $order->image=$cart->image;
                $order->product_id=$cart->product_id;
                $order->payment_status='UnPaid';
                $order->delivary_staus='proceessing';
                $order->save();
                
                $cart_id=$cart->id;
                $cart_delete=cart::find($cart_id);
                $cart_delete->delete();
                
            

                
            }
    
          
    
            
    
                  
    
            return redirect()->back()->with('success','Payment is Successful!!');
    
        }
    }
