<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style type ="text/css">
    input [type ='text']
    {
        width: 400px;
        height: 50px;
    }
    .design
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
        padding: 15px;
    }
    .table_design
    {
        text-align: center;
        margin: auto;
        margin-top: 50px;
        border: 2px solid white;
    }
    th
    {
      background-color: #102c57;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      border: 1px solid white;
      color: white;
    }
    td
    {
        color: white;
        padding: 10px;
        border: 1px solid white;
    }
    .delcat
    {
        background-color: #102c57;
    }
    .edcat
    {
        background-color: #102c57;
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
          <h2 style="color: white">Add Category</h2>
          <div class="design"> 
                <form action="{{url('add_category')}}" method="post">
                    @csrf
                    <div>
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
            </div> 
                <div>
                    <table class="table_design">
                        <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="edcat">Edit Category</th>
                        <th class="delcat">Delete Category</th>
                        </tr>

                        @foreach($data as $datas)

                        <tr>
                            <td>{{$datas->id}}</td>
                            <td>{{$datas->categoryName}}</td>
                            <td>{{$datas->created_at}}</td>
                            <td>{{$datas->updated_at}}</td>
                            <td><a class ="btn btn-success"  href="{{url('edit_category',$datas->id)}}">Edit</td>
                            <td><a class ="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$datas->id)}}">Delete</td>
                        </tr>

                        @endforeach
                    </table>
                </div>
                <div class="design">
                {{$data->links()}}
            </div>
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
                title:"Are you sure to delete this category?",
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