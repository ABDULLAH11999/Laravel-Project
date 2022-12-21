<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <style>
     .divcenter{
       text-align:center;
                padding-top:20px;
            }
            .h2font{
                font-size:40px;
                padding-top:20px;
            }
            .form-control {
                   color:white;
            }
            .form-control:Hover {
                   color:white;
            }
            .center{
              margin:auto;
              width:50%;
              text-align:center;
              margin-top: 20px;
              border: 2px solid grey;
            }
            .itext{
                color:black;
            }
        
            label{
              display:inline-block;
              width:200px;
            }
        
            .divcenter{
                text-align:center;
                padding-top:20px;
            }
            .h2font{
                font-size:40px;
                padding-top:20px;
            }
            .form-control {
                   color:white;
            }
            .form-control:Hover {
                   color:white;
            }
            .center{
              margin:auto;
              width:50%;
              text-align:center;
              margin-top: 20px;
              border: 2px solid grey;
            }
            .table{
              border: 2px solid white;
              width:65%;
              margin: auto;
              padding-top: 50px;

            }
            .th{
              background-color:grey;
              color:white;
            }
            /* { 
                width:250px;
                height:86px;
                display: block;
            } */
           .table td img {
    width: 130px;
    height: 40px;
    border-radius: 10%;
}


            
        </style>

     @include('admin.sidebar')
      @include('admin.header')
    
      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                  @endif

                  <div class="divcenter">
               <h2 class="h2font"> All Orders</h2>
               <div style="margin:auto; padding-bottom:30px;">
                <form action="{{url('search')}}" method="get">
                  @csrf
<input style="color:black;" type="text" name="search" placeholder="Search now">
<input type="submit" value="Search" class="btn btn-outline-primary">              
               </form>
              </div>
<table class="table my-3">
  <tr class="th">
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Product_title</th>
    <th>Qauntity</th>
    <th>Price</th>
    <th>Payment Status</th>
    <th>Delivery Status</th>
    <th>Image</th>
    <th>Delivered</th>
    <th>Print PDF</th>
    <th>Send Email</th>
  </tr>
@forelse($order as $order)
  <tr>
    <td style="color:white;">{{$order->name}}</td>
    <td style="color:white;">{{$order->email}}</td>
    <td style="color:white;">{{$order->address}}</td>
    <td style="color:white;">{{$order->phone}}</td>
    <td style="color:white;">{{$order->product_title}}</td>
    <td style="color:white;">{{$order->quantity}}</td>
    <td style="color:white;">{{$order->price}}</td>
    <td style="color:white;">{{$order->payment_status}}</td>
    <td style="color:white;">{{$order->delivery_status}}</td>
    <td style="color:white;"><img class="image" src="/product/{{$order->image}}" alt=""></td>
    <td style="color:white;">
      @if($order->delivery_status=='processing...')
      <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered')" class="btn btn-success my-2  mx-2">Delivered</a>
      @else
      <p style="color: green;">Delivered</p>
      @endif
    </td>
    <td style="color:white;">
      <a class="btn btn-secondary" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
    </td>
    <td>
      <a Class="btn btn-info" href="{{url('send_email',$order->id)}}">Send Email</a>
    </td>
  </tr>
  @empty
<tr>
  <td>
    No Data Found
  </td>
</tr>
  @endforelse
</table>


               </div>
               <div>
        </div>

@include('admin.script')
  </body>
</html>
