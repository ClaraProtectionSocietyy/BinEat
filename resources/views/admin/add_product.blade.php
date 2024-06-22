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
        margin-top: 60px;
    }

    h2
    {
        color: white;
    }

    label 
    {
        display: inline-block;
        font-size : 18px!important;
        color: white!important;
        width : 250px;
    }
    input[type='text']
    {
        width: 400px;
        height: 50px;
    }
    textarea
    {
        width: 400px;
        height: 80px;
    }
    .inpt_ft
    {
        padding: 15px;

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

            <h2>Product Detail</h2>
            <div class="design">
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="inpt_ft">
                        <label for="">Product Title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="inpt_ft">
                        <label for="">Description</label>
                        <textarea name="description" required></textarea>
                    </div>

                    <div class="inpt_ft">
                        <label for="">Price</label>
                        <input type="text" name="price">
                    </div>

                    <div class="inpt_ft">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity">
                    </div>
                        
                    <div class="inpt_ft">
                        <label for="">Product Category</label>
                        <select name="category" required>
                            <option>Select an Option</option>
                            @foreach($category as $category)
                            <option value="{{$category->categoryName}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                       
                    <div class="inpt_ft">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>     
                    
                    <div class="inpt_ft">
                        <input class="btn btn-success" type="submit" value="Add Product">
                    </div>  
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