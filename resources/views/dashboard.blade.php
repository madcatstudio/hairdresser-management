@extends('layouts.admin')

@section('page-title', trans('sections.dashboard') )
@section('page-description', trans('strings.welcome', ['name' => Auth::User()->name]) )

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

            	<p>{{ trans_choice('sections.clients', 2) }} {{ trans_choice('strings.registered', 2) }}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/clients') }}" class="small-box-footer">
              {{ trans('strings.list') }} {{ trans_choice('sections.clients', 2) }} <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/clients/create') }}" class="small-box-footer">
              {{ trans('strings.add') }} {{ trans_choice('sections.clients', 1) }} <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-aqua">
            <div class="inner">
            	<h3>{{ $services }}</h3>

            	<p>{{ trans_choice('sections.services', 2) }} {{ trans_choice('strings.registered', 2) }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-scissors"></i>
            </div>
            <a href="{{ url('/services') }}" class="small-box-footer">
              {{ trans('strings.list') }} {{ trans_choice('sections.services', 2) }} <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/services/create') }}" class="small-box-footer">
              {{ trans('strings.add') }} {{ trans_choice('sections.services', 1) }} <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-green">
            <div class="inner">
            	<h3>{{ $companies }}</h3>

            	<p>{{ trans_choice('sections.companies', 2) }} {{ trans_choice('strings.registered', 2) }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="{{ url('/companies') }}" class="small-box-footer">
              {{ trans('strings.list') }} {{ trans_choice('sections.companies', 2) }} <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/companies/create') }}" class="small-box-footer">
              {{ trans('strings.add') }} {{ trans_choice('sections.companies', 1) }} <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-red">
            <div class="inner">
            	<h3>{{ $products }}</h3>

            	<p>{{ trans_choice('sections.products', 2) }} {{ trans_choice('strings.registered', 2) }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ url('/products') }}" class="small-box-footer">
              {{ trans('strings.list') }} {{ trans_choice('sections.products', 2) }} <i class="fa fa-list-ul"></i>
            </a>
            <a href="{{ url('/products/create') }}" class="small-box-footer">
              {{ trans('strings.add') }} {{ trans_choice('sections.products', 1) }} <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection