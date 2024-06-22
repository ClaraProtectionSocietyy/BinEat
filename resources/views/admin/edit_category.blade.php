<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

  <style type="text/css">
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }
    input[type='text'] 
    {
        width: 400px;
        height: 50px;
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
            <h2 style="color:white">Update Category</h2>
        <div class="design">
            <form action="{{url('update_category',$data->id)}}" method="post">
            @csrf
                <input type="text" name="categoryid" value="{{$data->id}}">
                <input type="text" name="category" value="{{$data->categoryName}}">
                <input class="btn btn-primary" type="submit" value="Update ID or CategoryName ">
            </form>
        </div>
        
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{('/admincss/js/charts-home.js')}}"></script>
    <script src="{{('/admincss/js/front.js')}}"></script>
  </body>
</html>