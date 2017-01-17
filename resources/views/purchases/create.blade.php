@extends('layouts.admin')

@section('page-title', 'New Purchase')
@section('page-description', 'Add a new Purchase to this Client')

@section('breadcrumb')
    <li><a href="{{ url('/clients') }}">Clients</a></li>
    <li><a href="{{ url('/clients') }}/{{ $client->id }}">{{ $client->name }}</a></li>
    <li class="active">New Purchase</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">

      @include('clients.profilebox')
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">New Purchase</h3>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="/purchase/store">
                <div class="box-body">
                    
                    @include('alerts')
                  
                    {{ csrf_field() }}

                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date" class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-10">
                            <div class="input-group date" >
                                <input id="date" type="text" class="form-control datepicker" name="date" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" >
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
                        <label for="service_id" class="col-sm-2 control-label">Products</label>

                        <div class="col-sm-10">
                            @foreach($products as $product)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="products[]" id="{{ $product->id }}" value="{{ $product->id }}"> {{ $product->name }} <small>({{ $product->company->name}})</small>
                                    </label>
                                </div>
                            @endforeach

                            @if ($errors->has('product_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('product_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                        <label for="note" class="col-sm-2 control-label">Note</label>

                        <div class="col-sm-10">
                        <textarea id="note" type="text" class="form-control" name="note" rows="10">{{ old('note') }}</textarea>

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
                    <button type="submit" class="btn btn-primary">Add Purchase to {{ $client->name }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });

    CKEDITOR.replace('note');
</script>
@endsection