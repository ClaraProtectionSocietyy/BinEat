<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style class="text/css">
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    .table_design
    {
        border: 1px solid white;
    }
    th 
    {
      background-color: #102c57;
      color: white;
      font-size: 20px;
      font-weight: bold;
      padding: 15px;
      border: 1px solid white;
    }
    td
    {
      border: 1px solid white;
      text-align: center;
    }
    input[type='search']
    {
      width: 500px;
      height: 35px;
      margin-Left: 50px;
    }
  </style>
  </head>
  <body>
  @include('admin.header')
  @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
        <h2 style="color:white">All Products</h2>
        <form action="{{url('product_search')}}" method="get">
          @csrf
          <input type="search" name="search">
          <input type="submit" class="btn-btn-secondary" value="Search">
        </form>    
        <div class="design">
                <table class="table_design">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit Product</th>
                    <th>Delete Product</th>
                </tr>
                @foreach($product as $products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description,50)!!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td><img height="100" weight="100" src="products/{{$products->image}}"></td>
                    <td><a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a></td>
                </tr>
                @endforeach
                </table>
            </div>
            <div class="design">
                {{$product->links()}}
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation (ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            console.log(urlToRedirect);
            
            swal({
                title:"Are you sure to delete this product?",
                text:"This action can't be undone!",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            })
            .then((willCancel)=>{
                if(willCancel)
                {
                    window.location.href=urlToRedirect;
                }   
            })
        }
    </script>
    <script src="{{('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{('/admincss/js/charts-home.js')}}"></script>
    <script src="{{('/admincss/js/front.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>