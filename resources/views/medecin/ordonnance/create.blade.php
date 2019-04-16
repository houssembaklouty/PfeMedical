@extends('medecin.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">

  	  	@if (session('status'))
  			<div class="col-md-8 col-md-offset-2">
  			  	<div class="alert alert-success alert-dismissible">
  			  	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  			  	  <h4><i class="icon fa fa-check"></i> Alert!</h4>
  			  	  {{ session('status') }}
  			  	</div>
  			</div>
  	  	@endif

    <!-- left column -->
    <div class="col-md-8 col-md-offset-2">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">NV. Ordennance</h3>

          <span class="pull-right"><strong>Date : </strong> {{ now() }}</span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

	          <div class="register-box-body">

	            <form method="POST" action="{{ route('ordonnance.store') }}">
	                @csrf
	              <div class="form-group has-feedback">
	                <span class="glyphicon glyphicon-user form-control-feedback"></span>
	                <select name="user" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}">
	                	<option selected="" disabled="" value="">Select Patient..</option>
	                	@foreach($patients as $patient)
	                		<option value="{{ $patient->id }}">
	                			{{ $patient->first_name }} {{ $patient->last_name }}</option>
	                	@endforeach
	                </select>
	              </div>

	              @if ($errors->has('first_name'))
	                  <span class="invalid-feedback" role="alert">
	                      <strong>{{ $errors->first('first_name') }}</strong>
	                  </span>
	              @endif

	              <div class="form-group">
	                <label for="comment">Note:</label>
	                <textarea class="form-control" rows="10" name="description" id="description"></textarea>
	              </div>

	              <div class="row">
	                <div class="col-xs-8">
	                </div>
	                <!-- /.col -->
	                <div class="col-xs-4">
	                  <button type="submit" class="btn btn-primary btn-block btn-flat">Enregistrée</button>
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