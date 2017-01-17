@extends('layouts.admin')

@section('page-title', 'Clients List')
@section('page-description', 'Click a client for more information')

@section('breadcrumb')
    <li class="active">Clients</li>
@endsection

@section('content')
	<div class="box box-primary">
    	<div class="box-header">
        	<h3 class="box-title">Clients</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
        	@include('alerts')

			<table id="client-index" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th style="width: 100px">Member since</th>
						<th style="width: 40px">Number</th>
						<th style="width: 40px">Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($clients as $client)
				<tr>
					<th>{{ $client->name }}</th>
					<th>{{ $client->created_at->format('d/m/Y') }}</th>
					<th>{{ $client->number }}</th>
					<th>
						<a href="/clients/{{ $client->id }}" class="btn btn-primary">View</a>
					</th>
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
		    $('#client-index').DataTable();
		} );

		function deleteClient($id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Client.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
            document.getElementById('delete-client').submit();
            // swal("Deleted!", "The Treatment has been deleted.", "success");
        });
    }
	</script>
@endsection