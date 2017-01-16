@extends('layouts.admin')

@section('page-title', 'Company Details')
@section('page-description', 'All the information about the Company')

@section('breadcrumb')
    <li><a href="{{ url('/companies') }}">Companies</a></li>
    <li class="active">{{ $company->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img/avatar2.png') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $company->name }}</h3>

                <!-- <p class="text-muted text-center">n°</p> -->

                <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                      <b>Birthdate</b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item">
                      <b>Age</b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"></a>
                    </li>
                  </ul> -->

            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
        <!-- /.box-body -->
        </div>
    </div>

    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#products" data-toggle="tab">Products</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

                @include('alerts')

                <div class="active tab-pane" id="products">
                    <div class="box">
                        <div class="box-body">
                            <table id="company-products" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($company->products as $product)
                                <tr>
                                    <th>{{ $product->name }}</th>
                                    <th>
                                        <a href="/products/{{ $product->id }}" class="btn btn-primary" role="button">View</a>
                                    </th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <a href="{{ url('/products/create') }}" class="btn btn-primary" role="button">Add Product</a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="settings">

                    <form class="form-horizontal" role="form" method="POST" action="/companies/{{ $company->id }}/edit">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $company->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="/companies/{{ $company->id }}/delete" class="btn btn-danger" role="button">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#company-products').DataTable();
        } );
    </script>
@endsection