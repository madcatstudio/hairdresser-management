@extends('layouts.admin')

@section('page-title', 'Product Details')
@section('page-description', 'All the information about the Product')

@section('breadcrumb')
    <li><a href="{{ url('/products') }}">Products</a></li>
    <li class="active">{{ $product->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img/avatar2.png') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $product->name }}</h3>

                <p class="text-muted text-center">{{ $product->company->name }}</p>

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

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Product Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>{{ $product->body }}</p>
              <!-- <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong> -->

              
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#clients" data-toggle="tab">Clients</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

                @include('alerts')

                <div class="active tab-pane" id="clients">
                    <div class="box">
                        <div class="box-body">
                            <table id="product-clients" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product->purchases as $purchase)
                                <tr>
                                    <th>{{ $purchase->date->format('d/m/Y') }}</th>
                                    <th>{{ $purchase->user->name }}</th>
                                    <th>
                                        <a href="/clients/{{ $purchase->user->id }}" class="btn btn-primary" role="button">View</a>
                                    </th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal" role="form" method="POST" action="/products/{{ $product->id }}/edit">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                            <label for="company_id" class="col-sm-2 control-label">Company</label>

                            <div class="col-sm-10">
                                <select id="company_id" type="text" class="form-control" name="company_id" required>
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                        @if($product->company_id == $company->id)
                                            <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                        @else
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('company_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-sm-2 control-label">Body</label>

                            <div class="col-sm-10">
                                <textarea id="body" type="text" class="form-control" name="body" rows="10" autofocus>{{ $product->body }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Update</button>
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
            $('#product-clients').DataTable();
        } );
    </script>
@endsection