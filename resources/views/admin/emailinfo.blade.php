<x-app-layout>
  </x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/pulic">
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
  <style type="text/css">
     .divcenter{
       text-align:center;
                padding-top:20px;
            }
            label {
    display: inline-block;
    width: 200px;
    font-size: 18px;
    font-weight: bold;
}
            .h2font{
                font-size:40px;
                padding-top:20px;
            }
            .center{
              margin:auto;
              width:50%;
              text-align:center;
              margin-top: 20px;
              border: 2px solid grey;
            }
        
            .divcenter{
                text-align:center;
                padding-top:20px;
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
               <h2 class="h2font"> Send email to {{$order->email}}</h2>

               <form method="POST" action="{{URL('send_user_email',$order->id)}}">

               @csrf

<div style=" padding-top:3%;">
    <label> Greeting :</label>
    <input style="color:black;" type="text" class="greeting">
</div>

<div style=" padding-top:3%;">
    <label> Email Firstline :</label>
    <input style="color:black;" type="text" class="firstline">
</div>

<div style=" padding-top:3%;">
    <label> Email Body :</label>
    <input style="color:black;" type="text" class="body">
</div>

<div style=" padding-top:3%;">
    <label> Email Button :</label>
    <input style="color:black;" type="text" class="button">
</div>

<div style=" padding-top:3%;">
    <label> Email URL :</label>
    <input style="color:black;" type="text" class="url">
</div>

<div style=" padding-top:3%;">
    <label> Email Lastline :</label>
    <input style="color:black;" type="text" class="lastline">
</div>

<input style="color:black;" type="submit" value="Send Email" class="btn btn-primary my-4">

</div>

</form>

@include('admin.script')
  </body>
</html>
