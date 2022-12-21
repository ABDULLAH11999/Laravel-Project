<base href="/public">
@include('home.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
</style>

<div>
    <table class="center my-4 ">
        <tr>
            <th class= "th_deg">Product Title</th>
            <th class= "th_deg">Quantity</th>
            <th class= "th_deg">Price</th>
            <th class= "th_deg">Payment Status</th>
            <th class= "th_deg">Delivery Status</th>
            <th class= "th_deg">Image</th>
            <th class= "th_deg">Cancel Order</th>
        </tr>
        @foreach($order as $order)
        <tr>
    <td>{{$order->product_title}}</td>
    <td>{{$order->quantity}}</td>
    <td>{{$order->price}}</td>
    <td>{{$order->payment_status}}</td>
    <td>{{$order->delivery_status}}</td>
    <td><img  style="height:80px; width:140px" class="image" src="/product/{{$order->image}}" alt=""></td>
    <td>
        @if($order->delivery_status='processing...')
        <a onclick="return confirm('Are you sure you want to Cancel this order !')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a></td>
        @else
        <p style="color:red;">Not Allowed</p>
        @endif
    </tr>
        @endforeach
    </table>
</div>

@include('home.footer')