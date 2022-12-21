
      
      <!-- product section -->
 <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
      
               <br>
               <div>
                  <form action="{{url('search_product')}}" method="Get">
                     <input style="width:500px" type="text" name="search" placeholder="Search Here">
                     <input type="submit" value="search" >
                  </form>
               </div>
            </div>

            <div class="row">
               @foreach ($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                         Product details
                           </a>
                        <form action="{{url('add_cart',$products->id)}}" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                           <input type="number" name="quantity" max="{{$products->quantity}}" value="1" min="1" style="width:70px; margin-left:35px;">
                           </div>
                           <div class="col-md-4">
                           <input type="submit" value="Add to Cart">
                           </div>
                           </div>
                        </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount_price!=null)
                        <h6 style="color:black;">
                        Discount price
                        <br>
                         {{$products->discount_price}}
                        </h6>
                        <h6 style="text-decoration:line-through; color:red;">
                        Price
                        <br>
                         {{$products->price}}
                        </h6>
                      
                        @else
                        <h6 style="color:black;">
                           Price
                        <br>
                         {{$products->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
            @endforeach
<span class="my-3">
            {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
            </span>
         </div>
      </section>
      <!-- end product section -->
 
 
 
 <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
 

 