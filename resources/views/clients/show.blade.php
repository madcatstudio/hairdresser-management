@extends('layouts.admin')

@section('page-title', 'Client Details')
@section('page-description', 'Profile, Treatments and Purchases')

@section('breadcrumb')
    <li><a href="{{ url('/clients') }}">Clients</a></li>
    <li class="active">{{ $client->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">

      @include('clients.profilebox')
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#treatments" data-toggle="tab">Treatments</a></li>
              <li><a href="#purchases" data-toggle="tab">Purchases</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
        <div class="tab-content">

            @include('alerts')

            <div class="active tab-pane" id="treatments">
                <div class="box">
                    <div class="box-body">
                        <table id="client-treatments" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 60px">Date</th>
                                    <th>Services</th>
                                    <th>Notes</th>
                                    <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($client->treatments as $treatment)
                            <tr>
                                <th>{{ $treatment->date->format('d M Y') }}</th>
                                <th>
                                    <ul>
                                    @foreach($treatment->services as $service)
                                        <li>{{ $service->name }}</li>
                                    @endforeach
                                    </ul>
                                </th>
                                <th>{{ $treatment->note }}</th>
                                <th>
                                  <a href="{{ url('/treatment/edit') }}" class="btn btn-primary" 
                                     onclick="event.preventDefault();
                                     document.getElementById('edit-treatment-{{ $treatment->id }}').submit();">
                                     Edit
                                  </a>

                                  <form id="edit-treatment-{{ $treatment->id }}" action="{{ url('/treatment/edit') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                      <input type="hidden" id="treatment_id" name="treatment_id" value="{{ $treatment->id }}">
                                  </form>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                      <a href="{{ url('/clients') }}/{{ $client->id }}/create/treatment" class="btn bg-orange" role="button">Add Treatment</a>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="purchases">
                <div class="box">
                    <div class="box-body">
                        <table id="client-purchases" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 60px">Date</th>
                                    <th>Products</th>
                                    <th>Notes</th>
                                    <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($client->purchases as $purchase)
                            <tr>
                                <th>{{ $purchase->date->format('d M Y') }}</th>
                                <th>
                                    <ul>
                                    @foreach($purchase->products as $product)
                                        <li>{{ $product->name }} <small>({{ $product->company->name}})</small></li>
                                    @endforeach
                                    </ul>
                                </th>
                                <th>{{ $purchase->note }}</th>
                                <th>
                                    <a href="{{ url('/purchase/edit') }}" class="btn btn-primary" 
                                     onclick="event.preventDefault();
                                     document.getElementById('edit-purchase-{{ $purchase->id }}').submit();">
                                     Edit
                                  </a>

                                  <form id="edit-purchase-{{ $purchase->id }}" action="{{ url('/purchase/edit') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                      <input type="hidden" id="purchase_id" name="purchase_id" value="{{ $purchase->id }}">
                                  </form>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                      <a href="{{ url('/clients') }}/{{ $client->id }}/create/purchase" class="btn bg-maroon" role="button">Add Purchase</a>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="settings">
              <form class="form-horizontal" role="form" method="POST" action="/clients/{{ $client->id }}/edit">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $client->name }}" required autofocus>

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
                        <input id="number" type="text" class="form-control" name="number" value="{{ $client->number }}" required autofocus>

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
                      <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $client->birthdate->format('Y-m-d') }}" >

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
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $client->phone }}" >

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
                        <input id="email" type="email" class="form-control" name="email" value="{{ $client->email }}" >

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
                      <textarea id="note" type="text" class="form-control" name="note" rows="10" autofocus>{{ $client->note }}</textarea>

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
                      <input id="password" type="password" class="form-control" name="password">

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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div> -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('/clients/delete') }}" class="btn btn-danger" 
                        onclick="event.preventDefault();
                        deleteClient();">
                        Delete
                    </a>
                  </div>
                </div>
              </form>
              <form id="delete-client" action="{{ url('/clients/delete') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" id="client_id" name="client_id" value="{{ $client->id }}">
              </form>
            </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
      $('#client-treatments').DataTable();
      $('#client-purchases').DataTable();
  });

  function deleteClient() {
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