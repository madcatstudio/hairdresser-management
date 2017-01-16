<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img') }}/{{ Auth::User()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->name }} ({{ Auth::user()->number }})</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">DASHBOARDS</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-link"></i> <span>Overview</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/clients') }}">List</a></li>
            <li><a href="{{ url('/clients/create') }}">Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/services') }}">List</a></li>
            <li><a href="{{ url('/services/create') }}">Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Companies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/companies') }}">List</a></li>
            <li><a href="{{ url('/companies/create') }}">Add</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li><a href="{{ url('/products') }}">List</a></li>
            <li><a href="{{ url('/products/create') }}">Add</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>