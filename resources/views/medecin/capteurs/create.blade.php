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
          <h3 class="box-title">Ajouter Capteur</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

	          <div class="register-box-body">

	            <form method="POST" action="{{ route('capteurs.store') }}">
	                @csrf
	              <div class="form-group has-feedback">
	                <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus placeholder="Type">
	                <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>

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