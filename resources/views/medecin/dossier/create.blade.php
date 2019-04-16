@extends('medecin.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8 col-md-offset-2">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ajouter Patient</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

	          <div class="register-box-body">

	            <form method="POST" action="{{ route('patients.store') }}">
	                @csrf
	              <div class="form-group has-feedback">
	                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Nom">
	                <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>

	              @if ($errors->has('first_name'))
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $errors->first('first_name') }}</strong>
	                  </span>
	              @endif

	              <div class="form-group has-feedback">
	                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required placeholder="Prénom">
	                <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>

	              @if ($errors->has('last_name'))
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $errors->first('last_name') }}</strong>
	                  </span>
	              @endif
	              
	              <div class="form-group has-feedback">
	                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
	                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	              </div>

	              @if ($errors->has('email'))
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $errors->first('email') }}</strong>
	                  </span>
	              @endif

	              <div class="form-group has-feedback">
	                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required placeholder="Adresse">
	                <span class="glyphicon glyphicon-address form-control-feedback"></span>
	              </div>

	              @if ($errors->has('address'))
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $errors->first('address') }}</strong>
	                  </span>
	              @endif

	              <div class="row">
	                <div class="col-xs-8">
	                </div>
	                <!-- /.col -->
	                <div class="col-xs-4">
	                  <button type="submit" class="btn btn-primary btn-block btn-flat">Ajouter</button>
	                </div>
	                <!-- /.col -->
	              </div>
	            </form>

	          </div>
	          <!-- /.form-box -->
	        </div>
	        <!-- /.register-box -->
    	</div>
    	<!-- /.box -->

    </div>

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

@endsection