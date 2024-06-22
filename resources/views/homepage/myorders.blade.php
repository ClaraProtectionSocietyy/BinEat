<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Page</title>
  @include('homepage.css')
  <style type="text/css">
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
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
  </style>
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('homepage.header')
   <div class="design">
    <table>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Image</th>
      </tr>

      @foreach($order as $order)
      <tr>
        <td>{{$order->product->title}}</td>
        <td>{{$order->product->price}}</td>
        <td>{{$order->status}}</td>
        <td>
          <img width="100s" height="100" src="products/{{$order->product->image}}">
        </td>
      </tr>
      @endforeach
    </table>
   </div>

  </div>
  @include('homepage.footer')
</body>
</html>