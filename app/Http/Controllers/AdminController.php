<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
public function view_category(){
    $usertype=Auth::user()->usertype;
   if($usertype=='1'){
        $data=category::all();
        return view('admin.category', compact('data'));
    }
    else{
        return redirect('login');
    }
}
public function add_category(Request $request){
  $usertype=Auth::user()->usertype;
   if($usertype=='1'){
        $data = new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category added successfully');
    }
    else{
        return redirect('login');
    }
}
public function delete_category($id){
  $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
    $data=category::find($id);
    $data->delete();
    return redirect()->back()->with('message','Category deleted successfully');
    }
    else{
        return redirect('login');
    }
}

public function view_products(){
  $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
    $category=category::all();
    return view('admin.products',compact('category'));
}
else{
    return redirect('login');
}
}
public function add_products(Request $request){
  $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
    $product= new products;
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->discount_price=$request->discount_price;
    $product->quantity=$request->quantity;
    $product->category=$request->category;
    $image=$request->image;
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename); 
    $product->image=$imagename;
    $product->save();
    return redirect()->back()->with('message','Product added successfully');
}
else{
    return redirect('login');
}
    }

    public function show_products(){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $product = products::all();
        return view('admin.show', compact('product'));
    }
    else{
        return redirect('login');
    }
    }
    public function delete_product($id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $product=products::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully');
    }
    else{
        return redirect('login');
    }
    }
    public function update_product($id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $product=products::find($id);
        $category=category::all();
        return view('admin.update_product',compact('product','category'));
    }
    else{
        return redirect('login');
    }
    }
    public function update_product_confirm(Request $request,$id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $product=products::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $image=$request->image;
        if($image){ 
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename); 
        $product->image=$imagename;
        } 
        else{
            return redirect('login');
        }
    }
        $product->save();
        return redirect()->back()->with('message','Product updated successfully');
    }
    public function order(){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $order=Order::all();
        return view('admin.order',compact('order'));
    }
    else{
        return redirect('login');
    }
    }
    public function delivered($id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
    }
    else{
        return redirect('login');
    }
    }
    public function printpdf($id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $order=order::find($id);
$pdf=PDF::loadView('admin.pdf',compact('order'));
return $pdf->download('order_details.pdf');
    }
    else{
        return redirect('login');
    }
}

    public function sendemail($id){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $order=order::find($id);
        return view('admin.emailinfo',compact('order'));
    }
    else{
        return redirect('login');
    }
}
    public function senduseremail($id, Request $request){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
$order=order::find($id);
$details= [
    'greeting'=>$request->greeting,
    'firstline'=>$request->firstline,
    'body'=>$request->body,
    'button'=>$request->button,
    'url'=>$request->url,
    'lastline'=>$request->lastline
];
Notification::send($order,new SendEmailNotification($details));
return redirect()->back();
}
else{
    return redirect('login');
}
}

    public function searchdata(Request $request){
      $usertype=Auth::user()->usertype;
   if($usertype=='1'){ 
        $searchtext=$request->search;
        $order=order::where('name','LIKE',"%$searchtext%")->orWhere('email','LIKE',"%$searchtext%")->orWhere('product_title','LIKE',"%$searchtext%")->orWhere('phone','LIKE',"%$searchtext%")->get();
        return view('admin.order',compact('order'));
    }
    else{
        return redirect('login');
    }
}
}