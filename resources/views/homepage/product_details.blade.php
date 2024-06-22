<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css') }}">
<link rel="stylesheet"  href="{{asset('css/font-awesome.min.css') }}">
<link rel="stylesheet"  href="{{asset('css/responsive.css') }}">
<link rel="stylesheet"  href="{{asset('css/style.css') }}">
<link rel="stylesheet"  href="{{asset('css/style.css.map') }}">
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

  @include('homepage.css')

  <style type="text/css">
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }
    .detail-box 
    {
        padding: 15px;
    }
  </style>

</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
    @include('homepage.header')
    <!-- end header section -->
  </div>

      <!--Product Details Start-->
    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Product Details 
        </h2>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="box">

              <div class="design">
                <img width ="400px" height="300px" src="/products/{{$data->image}}">
              </div>

              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>Price
                  <span>${{$data->price}}</span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category : {{$data->category}}</h6>
                <h6>Quantity
                  <span>Available : {{$data->quantity}}</span>
                </h6>
              </div>

              <div class="detail-box">
                  <p>{{$data->description}}</p>
              </div>

              <div class="detail-box">
              <a class="btn btn-success" href="{{url('add_cart',$data->id)}}">Add To Cart</a>
              </div>
          </div>
        </div>       
      </div>
    </div>
  </section>

<!--Product Details End-->

  <!-- info section -->
  @include('homepage.footer')

</body>

</html>