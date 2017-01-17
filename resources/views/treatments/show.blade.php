@extends('layouts.admin')

@section('page-title', 'Edit Treatment')
@section('page-description', 'Edit a Treatment')

@section('breadcrumb')
    <li><a href="{{ url('/clients') }}">Clients</a></li>
    <li><a href="{{ url('/clients') }}/{{ $treatment->user->id }}">{{ $treatment->user->name }}</a></li>
    <li class="active">Edit Treatment</li>
@endsection

@section('content')
<div class="box box-primary">

    <form class="form-horizontal" role="form" method="POST" action="/treatment/edit">
        {{ method_field('PATCH') }}

        <div class="box-body">

            @include('alerts')

            {{ csrf_field() }}

            <input type="hidden" name="treatment_id" value="{{ $treatment->id }}">

            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date" class="col-sm-2 control-label">Date</label>

                <div class="col-sm-10">
                    <div class="input-group date" >
                        <input id="date" type="text" class="form-control datepicker" name="date" value="{{ $treatment->date->format('d/m/Y') }}" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    
                    @if ($errors->has('date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                <label for="service_id" class="col-sm-2 control-label">Services</label>

                <div class="col-sm-10">
                    @foreach($services as $service)
                        <div class="checkbox">
                            <label>
                                @if($treatment->services->contains($service->id))
                                    <input type="checkbox" checked="checked" name="services[]" id="{{ $service->id }}" value="{{ $service->id }}"> {{ $service->name }}
                                @else
                                    <input type="checkbox" name="services[]" id="{{ $service->id }}" value="{{ $service->id }}"> {{ $service->name }}
                                @endif
                            </label>
                        </div>
                    @endforeach

                    @if ($errors->has('service_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                <label for="note" class="col-sm-2 control-label">Note</label>

                <div class="col-sm-10">
                <textarea id="note" type="text" class="form-control" name="note" rows="10">{{ $treatment->note }}</textarea>

                    @if ($errors->has('note'))
                        <span class="help-block">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('/treatment/delete') }}" class="btn btn-danger" 
                onclick="event.preventDefault();
                deleteTreatment();">
                Delete
            </a>
        </div>
    </form>
    <form id="delete-treatment" action="{{ url('/treatment/delete') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" id="treatment_id" name="treatment_id" value="{{ $treatment->id }}">
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });

    CKEDITOR.replace('note');

    function deleteTreatment() {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Treatment.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
            document.getElementById('delete-treatment').submit();
            // swal("Deleted!", "The Treatment has been deleted.", "success");
        });
    }
</script>
@endsection