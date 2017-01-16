@extends('layouts.client')

@section('page-title', 'User Profile')
@section('page-description', 'User Treatments and Purchases')

@section('breadcrumb')
    <li class="active">{{ Auth::user()->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <!-- <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img') }}/{{ Auth::User()->avatar }}" alt="User profile picture"> -->

                <h1 class="text-center">{{ Auth::user()->name }}</h1>

                <p class="text-muted text-center">n°{{ Auth::user()->number }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Birthdate</b> <span class="pull-right">{{ Auth::user()->birthdate->format('d/m/Y') }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>Age</b> <span class="pull-right">{{ Auth::user()->birthdate->diffInYears(Carbon\Carbon::now()) }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <span class="pull-right">{{ Auth::user()->phone }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <span class="pull-right">{{ Auth::user()->email }}</span>
                    </li>
              </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
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
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3>Treatments</h3>
            </div>
            <div class="box-body">
                <ul class="list-unstyled">
                    @foreach(Auth::user()->treatments as $treatment)
                        <li>
                            <b>{{ $treatment->date->format('d M Y') }}</b>
                            <div>
                                <ul>
                                @foreach($treatment->services as $service)
                                    <li>{{ $service->name }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
              <h3>Purchases</h3>
            </div>

            <div class="box-body">
                <ul class="list-unstyled">
                    @foreach(Auth::user()->purchases as $purchase)
                        <li>
                            <b>{{ $purchase->date->format('d M Y') }}</b>

                            <div>
                                <ul>
                                @foreach($purchase->products as $product)
                                    <li>{{ $product->name }} <small>{{ $product->company->name }}</small></li>
                                @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection