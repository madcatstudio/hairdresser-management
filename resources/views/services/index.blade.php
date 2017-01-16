@extends('layouts.admin')

@section('page-title', 'Services List')
@section('page-description', 'Click a service for more information')

@section('breadcrumb')
    <li class="active">Services</li>
@endsection

@section('content')
	<div class="box box-primary">
    	<div class="box-header">
        	<h3 class="box-title">Services</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
        	@include('alerts')
                
			<table id="service-index" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th style="width: 40px">Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($services as $service)
				<tr>
					<th>{{ $service->name }}</th>
					<th><a href="/services/{{ $service->id }}" class="btn btn-primary">View</a></th>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#service-index').DataTable();
		} );
	</script>
@endsection