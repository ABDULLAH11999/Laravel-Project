<base href="/public">
@include('home.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<table class="center my-3">
        <tr style="backgoround-color:grey;">
            <th class="th_deg">Product title</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Product quantity</th>
            <th class="th_deg">Action</th>
        </tr>
        <?php $totalprice=0; ?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->price}}</td>
            <td><img src="product/{{$cart->image}}" alt="" style="height:80px; width:140px"></td>
            <td>{{$cart->quantity}}</td>
            <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove this product')" href="{{url('remove_cart',$cart->id)}}">Remove Products</a></td>
        </tr>
        <?php $totalprice=$totalprice + $cart->price ?>
        @endforeach
</table>
<div>
    <h4 class="mx-3 "><b> Totalprice: {{$totalprice}} </b> </h4>
</div>
<div class="pay my-3">
    <h3>Proceed to order</h3>
    <a href="{{url('cash_order')}}" class="btn btn-success">Cash on delivery</a>
    <a href="{{url('stripe',$totalprice)}}" class="btn btn-success">Pay using card</a>
</div>

<style>
       .center{
 margin:auto;
 width:70%;
 padding:30px;
 text-align:center;
    }
        table,th,td{
        border: 1px solid black;
    }
    .th_deg {
    padding: 5px;
    background-color: #e3e3e3;
    font-size: 15px;
}
    .pay{
        text-align:center;
    }
</style>

@include('home.footer')
