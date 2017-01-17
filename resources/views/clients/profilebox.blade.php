<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <!-- <img class="profile-user-img img-responsive img-circle" src="{{ asset('/dist/img') }}/{{ $client->avatar }}" alt="User profile picture"> -->

    <h3 class="profile-username text-center">{{ $client->name }}</h3>

    <p class="text-muted text-center">n°{{ $client->number }}</p>

    <ul class="list-group list-group-unbordered">
      @if(isset($client->birthdate))
      <li class="list-group-item">
        <b>Birthdate</b> <a class="pull-right">{{ $client->birthdate->format('d/m/Y') }}</a>
      </li>
      <li class="list-group-item">
        <b>Age</b> <a class="pull-right">{{ $client->birthdate->diffInYears(Carbon\Carbon::now()) }}</a>
      </li>
      @endif
      @if(isset($client->phone))
      <li class="list-group-item">
        <b>Phone</b> <a class="pull-right">{{ $client->phone }}</a>
      </li>
      @endif
      @if(isset($client->email))
      <li class="list-group-item">
        <b>Email</b> <a class="pull-right">{{ $client->email }}</a>
      </li>
      @endif
    </ul>

    <a href="{{ url('/clients') }}/{{ $client->id }}/create/treatment" class="btn bg-orange btn-block"><b>Add Treatment</b></a>
    <a href="{{ url('/clients') }}/{{ $client->id }}/create/purchase" class="btn bg-maroon btn-block"><b>Add Purchase</b></a>
  </div>
  <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- About Me Box -->
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">About User</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

    <p class="text-muted">
      B.S. in Computer Science from the University of Tennessee at Knoxville
    </p>

    <hr>

    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

    <p class="text-muted">Malibu, California</p>

    <hr>

    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

    <p>
      <span class="label label-danger">UI Design</span>
      <span class="label label-success">Coding</span>
      <span class="label label-info">Javascript</span>
      <span class="label label-warning">PHP</span>
      <span class="label label-primary">Node.js</span>
    </p>

    <hr> -->

    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
    <div>
      {!! $client->note !!}
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->