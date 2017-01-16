@extends('layouts.admin')

@section('page-title', 'Companies List')
@section('page-description', 'Click a company for more information')

@section('breadcrumb')
    <li class="active">Companies</li>
@endsection

@section('content')
	<div class="box box-primary">
    	<div class="box-header">
        	<h3 class="box-title">Companies</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	
        	@include('alerts')
            
			<table id="company-index" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th style="width: 40px">Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($companies as $company)
				<tr>
					<th>{{ $company->name }}</th>
					<th><a href="/companies/{{ $company->id }}" class="btn btn-primary">View</a></th>
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
		    $('#company-index').DataTable();
		} );
	</script>
@endsection