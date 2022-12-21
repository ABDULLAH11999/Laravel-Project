<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
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
                text-align:center;
            }
            .form-control {
                   color:white;
            }
            .form-control:Hover {
                   color:white;
            }
            .center{
              margin:auto;
              width:88%;
              text-align:center;
              margin-top: 40px;
              border: 2px solid grey;
            }
            .img_size{ 
                padding-top:5px;
                width:150px;
                height:86px;
            }
            .tr{
                background-color:orange;
                color:black;
            }
        </style>
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
            <h2 class="h2font">All Products</h2>
<table class="center" >
    <tr class="tr">
        <th>Product Title</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Price</th>
        <th>Discount Price</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($product as $product)
    <tr>
        <td>{{$product->title}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->discount_price}}</td>
        <td> <img class="img_size" src="/product/{{$product->image}}"> </td>
        <td><a href="{{url('delete_product', $product->id)}}" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger">Delete</a></td>
        <td><a href="{{url('update_product', $product->id)}}" class="btn btn-success">Edit</a></td>
        </tr>
    @endforeach
</table>
        </div></div>
@include('admin.script')
  </body>
</html>
