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
        margin-Top: 60px;
    }
    label 
    {
        display: inline-block;
        width: 200px;
        padding: 15px;
    }
    textarea 
    {
        width: 400px;
        height: 80px;
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
            <h2 style="color:white">Update Product</h2>
            <div class="design">
                <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>
                <div>
                    <label>Category</label>
                    <select name="category">
                        <option>{{$data->category}}</option>

                        @foreach($category as $category)
                        <option>{{$category->categoryName}}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label>Product Image</label>
                    <img width="200" height="200" src="/products/{{$data->image}}">
                </div>
                <div>
                    <label>New Image</label>
                    <input type="file" name="image">
                </div>
                <div>

                </div>
                    <input class="btn btn-success" type="submit" value="Update Product">
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