<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <center>
        <h3>Customer Name : {{$data->name}}</h3>
        <h3>Customer Address : {{$data->rec_address}}</h3>
        <h3>Customer Phone : {{$data->phone}}</h3>
        <h2>Product Title : {{$data->product->title}}</h2>
        <h2>Price : : {{$data->product->price}}</h2>
        <img width="150 px" height="150 px" src="products/{{$data->product->image}}">
    </center>
</body>
</html>