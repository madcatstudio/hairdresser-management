@extends('layouts.admin')

@section('page-title', 'Insert a Company')
@section('page-description', 'Fill all the information about the new Company')

@section('content')
<div class="box box-primary">
    <div class="box-header">
       	<h3 class="box-title">Insert a Company</h3>
    </div>
    <!-- /.box-header -->

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/companies/create') }}">
    	<div class="box-body">

            @include('alerts')

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="box-footer">
        	<button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>
</div>
@endsection