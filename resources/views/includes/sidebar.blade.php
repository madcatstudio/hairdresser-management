<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img') }}/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->name }} ({{ Auth::user()->number }})</p>
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/clients') }}"><i class="fa fa-list-ul"></i> List</a></li>
            <li><a href="{{ url('/clients/create') }}"><i class="fa fa-plus-circle"></i> Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-scissors"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/services') }}"><i class="fa fa-list-ul"></i> List</a></li>
            <li><a href="{{ url('/services/create') }}"><i class="fa fa-plus-circle"></i> Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-industry"></i> <span>Companies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/companies') }}"><i class="fa fa-list-ul"></i> List</a></li>
            <li><a href="{{ url('/companies/create') }}"><i class="fa fa-plus-circle"></i> Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/products') }}"><i class="fa fa-list-ul"></i> List</a></li>
            <li><a href="{{ url('/products/create') }}"><i class="fa fa-plus-circle"></i> Add</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>