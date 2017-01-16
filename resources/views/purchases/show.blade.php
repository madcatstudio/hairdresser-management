@extends('layouts.admin')

@section('page-title', 'Edit Purchase')
@section('page-description', 'Edit a Purchase')

@section('breadcrumb')
    <li><a href="{{ url('/clients') }}">Clients</a></li>
    <li><a href="{{ url('/clients') }}/{{ $purchase->user->id }}">{{ $purchase->user->name }}</a></li>
    <li class="active">Edit Purchase</li>
@endsection

@section('content')
<div class="box box-primary">

    <form class="form-horizontal" role="form" method="POST" action="/purchase/edit">
        {{ method_field('PATCH') }}

        <div class="box-body">

            @include('alerts')


            {{ csrf_field() }}

            <input type="hidden" name="purchase_id" value="{{ $purchase->id }}">

            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date" class="col-sm-2 control-label">Date</label>

                <div class="col-sm-10">
                    <input id="date" type="date" class="form-control" name="date" value="{{ $purchase->date->format('Y-m-d') }}" required>

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
                                @if($purchase->products->contains($product->id))
                                    <input type="checkbox" checked="checked" name="products[]" id="{{ $product->id }}" value="{{ $product->id }}"> {{ $product->name }}
                                @else
                                    <input type="checkbox" name="products[]" id="{{ $product->id }}" value="{{ $product->id }}"> {{ $product->name }}
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
                <textarea id="note" type="text" class="form-control" name="note" rows="10">{{ $purchase->note }}</textarea>

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
            <a href="{{ url('/purchase/delete') }}" class="btn btn-danger" 
                onclick="event.preventDefault();
                deletePurchase();">
                Delete
            </a>
        </div>
    </form>
    <form id="delete-purchase" action="{{ url('/purchase/delete') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" id="purchase_id" name="purchase_id" value="{{ $purchase->id }}">
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function deletePurchase() {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Purchase.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
            document.getElementById('delete-purchase').submit();
            // swal("Deleted!", "The Treatment has been deleted.", "success");
        });
    }
</script>
@endsection