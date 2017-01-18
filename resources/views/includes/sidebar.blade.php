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
        <li class="{{ isActiveRoute('dashboard') }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('sections.dashboard') }}</span></a></li>
        <li class="treeview {{ areActiveRoutes(['clients', 'clients-create']) }}">
          <a href="#"><i class="fa fa-users"></i> <span>{{ trans_choice('sections.clients', 2) }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li class="{{ isActiveRoute('clients') }}"><a href="{{ route('clients') }}"><i class="fa fa-list-ul"></i> {{ trans('strings.list') }}</a></li>
            <li class="{{ isActiveRoute('clients-create') }}"><a href="{{ route('clients-create') }}"><i class="fa fa-plus-circle"></i> {{ trans('strings.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ areActiveRoutes(['services', 'services-create']) }}">
          <a href="#"><i class="fa fa-scissors"></i> <span>{{ trans_choice('sections.services', 2) }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li class="{{ isActiveRoute('services') }}"><a href="{{ route('services') }}"><i class="fa fa-list-ul"></i> {{ trans('strings.list') }}</a></li>
            <li class="{{ isActiveRoute('services-create') }}"><a href="{{ route('services-create') }}"><i class="fa fa-plus-circle"></i> {{ trans('strings.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ areActiveRoutes(['companies', 'companies-create']) }}">
          <a href="#"><i class="fa fa-industry"></i> <span>{{ trans_choice('sections.companies', 2) }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li class="{{ isActiveRoute('companies') }}"><a href="{{ route('companies') }}"><i class="fa fa-list-ul"></i> {{ trans('strings.list') }}</a></li>
            <li class="{{ isActiveRoute('companies-create') }}"><a href="{{ route('companies-create') }}"><i class="fa fa-plus-circle"></i> {{ trans('strings.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ areActiveRoutes(['products', 'products-create']) }}">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>{{ trans_choice('sections.products', 2) }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" aria-expanded="true">
            <li class="{{ isActiveRoute('products') }}"><a href="{{ route('products') }}"><i class="fa fa-list-ul"></i> {{ trans('strings.list') }}</a></li>
            <li class="{{ isActiveRoute('products-create') }}"><a href="{{ route('products-create') }}"><i class="fa fa-plus-circle"></i> {{ trans('strings.add') }}</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>