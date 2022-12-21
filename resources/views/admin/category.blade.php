<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        </style>
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
            <div class="divcenter">
                <h2 class="h2font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="Post">
                    @csrf
                <div class="form-group">
                  <input type="text" required="" name="category" class="form-control mt-2" placeholder="Write category name">
                  <input type="submit" class="btn btn-primary mt-4" name="submit" value="Add Category">   
            </div>
            </form>
            <div>
              <table class="center">
                <tr>
                  <td>Category Name</td>
                  <td>Action</td>
                </tr>
@foreach($data as $data)
                <tr>
                  <td>{{$data->category_name}}</td>
                  <td><a onclick="return confirm('Are you sure to delete this category')" class="btn btn-danger" href="{{url('delete_category', $data->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
@include('admin.script')
  </body>
</html>
