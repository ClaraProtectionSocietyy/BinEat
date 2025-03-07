<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admincss/img/female-student.png')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Ivana Yoshe Aldora</h1>
            <p>Administrator</p>
          </div>
        </div>
        <!-- Sidebar Navigation-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li>
                  <a href="{{url('view_category')}}"> <i class="icon-grid"></i>
                  Manage Category</a>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Manage Product </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Product</a></li>
                    <li><a href="{{url('view_product')}}">View Product</a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{url('view_orders')}}"> <i class="icon-grid"></i>
                  Manage Order</a>
                </li>
        </ul>
      </nav>