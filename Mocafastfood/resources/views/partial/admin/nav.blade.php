<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('menus.index') }}" class="nav-link">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Menu
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                Role
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('permissions.create') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                Permission
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('orders.getOrderShipping') }}" class="nav-link">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <p>
                shipping
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>