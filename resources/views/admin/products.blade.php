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
               <h2 class="h2font"> Add products</h2>
               </div>
               <div>

               <form method="post" action="{{url('/add_products')}}" enctype="multipart/form-data" >
                @csrf
               <label>Product Title : </label>
               <input type="text" required="" class="itext" name="title" placeholder="Write a product title">
            </div>

            <div>
               <label>Product Description : </label>
               <input type="text" required="" class="itext" name="description" placeholder="Write a product description">
            </div>

            <div>
               <label>Product Price : </label>
               <input type="number" required="" class="itext" name="price" placeholder="Write a product price">
            </div>

            <div>
               <label>Product Discount : </label>
               <input type="number" min="0" class="itext" name="discount_price" placeholder="Write a discount">
            </div>

            <div>
               <label>Product Quantity : </label>
               <input type="number" required="" min="0" class="itext" name="quantity" placeholder="Write a product quantity">
            </div>

            <div>
               <label>Product Category : </label>
               <select name="category" required="" class="itext" >
                   <option value="" selected="">Add a category</option>
                   @foreach($category as $category)
                <option>{{$category->category_name}}</option>
                @endforeach
               </select>
            </div>

            <div>
               <label>Product Image : </label>
            <input type="file" name="image" required=""></input>
            </div>

            <div>
            <button class="btn btn-primary" type="submit">Add product</button>
            </div>
            </form>


            </div>
            </div>

@include('admin.script')
  </body>
</html>
