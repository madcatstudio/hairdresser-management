@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back Admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		@include('alerts')
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
            	<h3>{{ $clients }}</h3>

            	<p>Clients registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/clients') }}" class="small-box-footer">
              List Clients <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/clients/create') }}" class="small-box-footer">
              Add Client <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-aqua">
            <div class="inner">
            	<h3>{{ $services }}</h3>

            	<p>Services registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-scissors"></i>
            </div>
            <a href="{{ url('/services') }}" class="small-box-footer">
              List Services <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/services/create') }}" class="small-box-footer">
              Add Service <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-green">
            <div class="inner">
            	<h3>{{ $companies }}</h3>

            	<p>Companies registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="{{ url('/companies') }}" class="small-box-footer">
              List Companies <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/companies/create') }}" class="small-box-footer">
              Add Company <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-red">
            <div class="inner">
            	<h3>{{ $products }}</h3>

            	<p>Products registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ url('/products') }}" class="small-box-footer">
              List Products <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/products/create') }}" class="small-box-footer">
              Add Product <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection