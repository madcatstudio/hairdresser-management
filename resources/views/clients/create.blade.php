@extends('layouts.admin')

@section('page-title', 'Insert a Client')
@section('page-description', 'Fill all the information about the new Client')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Insert a Client</h3>
    </div>
    <!-- /.box-header -->

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/clients/create') }}">
        <div class="box-body">

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

            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                <label for="number" class="col-sm-2 control-label">Number</label>

                <div class="col-sm-10">
                    <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required autofocus>

                    @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                <label for="birthdate" class="col-sm-2 control-label">Birthdate</label>

                <div class="col-sm-10">
                    <div class="input-group date" >
                        <input id="birthdate" type="text" class="form-control datepicker" name="birthdate" value="{{ old('birthdate') }}" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    
                    @if ($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-sm-2 control-label">Phone number</label>

                <div class="col-sm-10">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" >

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">E-Mail Address</label>

                <div class="col-sm-10">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                <label for="note" class="col-sm-2 control-label">Note</label>

                <div class="col-sm-10">
                    <textarea id="note" type="text" class="form-control" name="note" rows="10" autofocus>{{ old('note') }}</textarea>

                    @if ($errors->has('note'))
                        <span class="help-block">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>

                <div class="col-sm-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>
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