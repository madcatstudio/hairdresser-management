@extends('layouts.client')

@section('page-title', 'Profile')
@section('page-description', 'User Profile, Treatments and Purchases')

@section('breadcrumb')
    <li class="active">{{ Auth::user()->name }}</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img') }}/{{ Auth::User()->avatar }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

          <p class="text-muted text-center">n°{{ Auth::user()->number }}</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Birthdate</b> <a class="pull-right">{{ Auth::user()->birthdate->format('d/m/Y') }}</a>
            </li>
            <li class="list-group-item">
              <b>Age</b> <a class="pull-right">{{ Auth::user()->birthdate->diffInYears(Carbon\Carbon::now()) }}</a>
            </li>
            <li class="list-group-item">
              <b>Phone</b> <a class="pull-right">{{ Auth::user()->phone }}</a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#treatments" data-toggle="tab">Treatments</a></li>
          <li><a href="#purchases" data-toggle="tab">Purchases</a></li>
        </ul>
        <div class="tab-content">

          @if (session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
          @endif
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

            <div class="active tab-pane" id="treatments">
                <div class="box">
                    <div class="box-body">
                        <table id="client-treatments" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 60px">Date</th>
                                    <th>Services</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->treatments as $treatment)
                            <tr>
                                <th>{{ $treatment->date->format('d M Y') }}</th>
                                <th>
                                    <ul>
                                    @foreach($treatment->services as $service)
                                        <li>{{ $service->name }}</li>
                                    @endforeach
                                    </ul>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="purchases">
                <div class="box">
                    <div class="box-body">
                        <table id="client-purchases" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 60px">Date</th>
                                    <th>Products</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->purchases as $purchase)
                            <tr>
                                <th>{{ $purchase->date->format('d M Y') }}</th>
                                <th>
                                    <ul>
                                    @foreach($purchase->products as $product)
                                        <li>{{ $product->name }}</li>
                                    @endforeach
                                    </ul>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#client-treatments').DataTable();
            $('#client-purchases').DataTable();
        } );
    </script>
@endsection