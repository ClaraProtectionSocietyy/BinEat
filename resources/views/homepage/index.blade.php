<!DOCTYPE html>
<html>

<head>
  @include('homepage.css')
</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
    @include('homepage.header')
    <!-- end header section -->

    <!-- slider section -->
    @include('homepage.slider')
    <!-- end slider section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->
  @include('homepage.product')
  <!-- end shop section -->

  <!-- info section -->
  @include('homepage.footer')

</body>

</html>