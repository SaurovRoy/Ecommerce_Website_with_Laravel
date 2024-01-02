<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use App\Notifications\MyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Notification;


class AdminController extends Controller
{

    //User Show Part

    public function user_show(){
        $user=User::all();
        
        return view('admin.user_show',compact('user'));
    }

    public function view_category(){
        $data=category::all();
        return view('admin.add_category',compact('data'));
    }

    // Category Parts Starts
    public function add_category(Request $request){
        $data=new category();
        $data->category=$request->category;
        $data->save();
        return redirect()->back()->with('message' , 'Category Added Successfully');

    }

    Public function DeleteCategory($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    //Category part end

    //product part start
    
    public function viewProduct(){
        $category=category::all();
        return view('admin.product',compact('category'));
    }
    public function uploadProduct(Request $request){
        $data=new product();
        $image=$request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $image->move('productimage',$imageName);
        $data->image=$imageName;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->category=$request->category;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discount_price=$request->discount_price;
        $data->save();
        return redirect()->back()->with('message','Your Product Data has been Uploades Successfully');
    }

    public function showProduct(){
       
        $data=product::all();
        return view('admin.showProduct',compact('data'));
    }
   
    public function deleteProduct($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function editViewProduct($id){
        $category=category::all();
        $data=product::find($id);
     
        return view('admin.editProduct',compact('data'),compact('category') );

    }
    public function updateProduct(Request $request,$id){
        $product=product::find($id);
        $image=$request->image;
       
   
             $imageName=time().'.'.$image->getClientOriginalExtension();
            $image->move('productimage',$imageName);
             $product->image=$imageName;
             $product->title=$request->title;
             $product->description=$request->description;
             $product->category=$request->category;
             $product->quantity=$request->quantity;
             $product->price=$request->price;
             $product->discount_price=$request->discount_price;
             $product->save();
             return redirect()->back()->with('message','Product Updated Successfully');

        
    }

    public function view_order(){
        $data=order::all();
        return view('admin.view_order',compact('data'));
    }
    public function delivered($id){
        $order=order::find($id);
        $order->delivary_staus="delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
        
    }
    public function processing($id){
        $order=order::find($id);
        $order->delivary_staus="Processing";
        $order->save();
        return redirect()->back();
        
    }
    // Print PDf

    public function print_pdf($id){
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    // Send Email Notification in laravel

    public function send_email($id){
        $order=order::find($id);
        return view('admin.send_email',compact('order'));
    }

    public function  send_user_email(Request $request,$id){
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline
        ];
        Notification::send($order,new MyNotification($details));
        
        return redirect()->back();
    }

    //Search order data

    public function search_order_data(Request $request){
        $search=$request->search;
        $data=order::where('name','LIKE',"%$search%")->get();
        return view('admin.view_order',compact('data'));
    }

    //Dashboard

    public function dashboard_view(){
        $data=order::all();
        return view('admin.main',compact('data'));
    }


 
}
