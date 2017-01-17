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
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img/boxed-bg.jpg') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $company->name }}</h3>

                <!-- <p class="text-muted text-center">n°</p> -->

                <ul class="list-group list-group-unbordered">
                    @if(isset($company->url))
                    <li class="list-group-item">
                      <b>Site</b> <a href="{{ $company->url }}" class="pull-right" target="_blank">{{ $company->url }}</a>
                    </li>
                    @endif
                </ul>

            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
        <!-- /.box-body -->
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Company Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! $company->body !!}
            </div>
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

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-2 control-label">Site</label>

                            <div class="col-sm-10">
                                <input id="url" type="text" class="form-control" name="url" value="{{ $company->url }}" placeholder="http://...">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="col-sm-2 control-label">Body</label>

                            <div class="col-sm-10">
                                <textarea id="body" type="text" class="form-control" name="body" rows="10" autofocus>{{ $company->body }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
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
            $('#company-products').DataTable();
        } );

        CKEDITOR.replace('body');
    </script>
@endsection