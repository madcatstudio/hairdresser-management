@extends('layouts.admin')

@section('page-title', 'Overview')
@section('page-description', 'Welcome back Admin')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Dashboard</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">

		@include('alerts')

		<p>Welcome back {{ Auth::User()->name }}!</p>
	</div>
	<div class="box-footer">
	</div>
</div>
@endsection