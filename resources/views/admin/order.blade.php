<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style type="text/css">
    table
    {
      border: 1px solid white;
      text-align: center;
      color: white;
    }
    th 
    {
        background-color: #102c57;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        border: 1px solid white;
    }
    .tbl 
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    td 
    {
        color: white;
        padding: 10px;
        border: 1px solid white;
    }
    .design 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }
    .searching
    {
      justify-content: center;
      align-items: center;
      padding: 30px;
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
          <form action="{{url('order_search')}}" method="get">
          @csrf
          <div class="searching">
          <input type="search" name="search">
          <input type="submit" class="btn-btn-secondary" value="Search">
          </div>
        </form>    
          <div>
          <table class="tbl">
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Product Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Pdf</th>
            </tr>
            @foreach($data as $datas)
            <tr>
                <td>{{$datas->name}}</td>
                <td>{{$datas->rec_address}}</td>
                <td>{{$datas->phone}}</td>
                <td>{{$datas->product->title}}</td>
                <td>{{$datas->product->price}}</td>
                <td>
                    <img width="100px" height="100px" src="products/{{$datas->product->image}}">
                </td>
                <td>
                    @if($datas->status =='in progress')
                    <span style="color:yellow">{{$datas->status}}</span>

                    @elseif($datas->status =='On Delivery')
                    <span style="color:#FFB1B1" >{{$datas->status}}</span>

                    @else($datas->status =='Completed')
                    <span style="color:#95D2B3" >{{$datas->status}}</span>

                    @endif
                </td>
                <td>
                    <a class="btn btn-secondary" href="{{url('otw',$datas->id)}}">On Delivery</a>
                    <a class="btn btn-success" href="{{url('completed',$datas->id)}}">Completed</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('print_pdf',$datas->id)}}">Donwload</a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="design">
                {{$data->links()}}
        </div>
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