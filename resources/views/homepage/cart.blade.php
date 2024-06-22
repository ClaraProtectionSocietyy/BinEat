<!DOCTYPE html>
<html>

<head>
  @include('homepage.css')
  <style type="text/css">
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px;
    }

    table 
    {
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }
    th 
    {
        border: 2px solid black;
        text-align: center;
        color: black;
        font-size: 20px;
        font-weight: bold;
        background-color: dark brown;
    }
    td 
    {
        border: 2px solid black;
    }
    h2
    {
        text-align: center;
        font-weight: bold;
        padding-Top: 50px;
        padding-Bottom: 20px;
    }
    h3
    {
        text-align: center;
        padding: 80px;
        margin-Bottom: 70px;
    }
    .des_order 
    {
      padding-Bottom: 100px;
      margin-Top: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    label 
    {
      display: inline-block;
      width: 150px;
    }
    .rcv 
    {
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
    @include('homepage.header')
    <!-- end header section -->

 
  </div>
  <h2>List Product on Cart</h2>
<div class="design">
    <table>
        <tr>
           <th>Product Name</th> 
           <th>Product Price</th>
           <th>Product Image</th>
           <th>Delete Product</th>
        </tr>

        <?php
        $value=0;
        ?>

        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
               <img width="100px" height="100px" src="/products/{{$cart->product->image}}" > 
            </td>
            <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_cart',$cart->id)}}">Remove</a></td>
        </tr>

        <?php
        $value = $value +$cart->product->price;
        ?>

        @endforeach
    </table>
</div>
<div>
  <h3>Total Price : ${{$value}}</h3>
</div>
<div class="des_order">
    <form action="{{url('confirm_order')}}" method="post">
      @csrf
      <div class="rcv">
        <label>Receiver Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
      </div>
      <div class="rcv">
        <label>Address</label>
        <textarea name="address" value="{{Auth::user()->address}}"></textarea>
      </div>
      <div class="rcv">
        <label>Phone</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}">
      </div>
      <div class="rcv">
        <input class="btn btn-primary" type="submit" value="Cash on Delivery">
        <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
      </div>
    </form>
  </div>
  <!-- info section -->
  @include('homepage.footer')

  <!-- Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>