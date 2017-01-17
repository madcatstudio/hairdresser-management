@extends('layouts.admin')

@section('page-title', 'Products List')
@section('page-description', 'Click a product for more information')

@section('breadcrumb')
    <li class="active">Products</li>
@endsection

@section('content')
	<div class="box box-primary">
    	<div class="box-header">
        	<h3 class="box-title">Products</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
        	@include('alerts')
            
			<table id="product-index" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th style="width: 80px">Company</th>
						<th style="width: 40px">Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($products as $product)
				<tr>
					<th>{{ $product->name }}</th>
					<th>{{ $product->company->name }}</th>
					<th><a href="/products/{{ $product->id }}" class="btn btn-primary">View</a></th>
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
		    $('#product-index').DataTable();
		} );
	</script>
@endsection