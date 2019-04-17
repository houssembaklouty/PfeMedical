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
          <h3 class="box-title">Rendez-vous</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

	          <div class="register-box-body">

	            <form method="POST" action="{{ route('rdv.store') }}">
	                @csrf

	                <div class="form-group has-feedback">
	                  <span class="glyphicon glyphicon-user form-control-feedback"></span> 
	                  <select name="user"
	                  		  class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}">
	                  	<option selected="" disabled="" value="">Select Patient..</option>

	                  	@foreach($patients as $patient)
	                  		<option value="{{ $patient->id }}">
	                  			{{ $patient->first_name }} {{ $patient->last_name }}</option>
	                  	@endforeach
	                  </select>
	                </div>

	                @if ($errors->has('user'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('user') }}</strong>
	                    </span>
	                @endif

	                <div class="row">
	                	<div class="col-ms-8 col-md-8">
	                		Date: [ exemple: {{ now()->format('d-m-Y') }} ]
	                		<input id="date" name="date" class="form-control" type="date" value="{{ old('date') }}" required autofocus>

	                		@if ($errors->has('date'))
	                		    <span class="invalid-feedback" role="alert">
	                		        <strong>{{ $errors->first('date') }}</strong>
	                		    </span>
	                		@endif

	                	</div>

	                	<div class="col-ms-4 col-md-4">
	                		Heure: [ exemple: {{ now()->format('H:m') }} ]
	                		<input id="temps" name="temps" class="form-control" type="time" value="{{ old('temps') }}" required>

	                		@if ($errors->has('temps'))
	                		    <span class="invalid-feedback" role="alert">
	                		        <strong>{{ $errors->first('temps') }}</strong>
	                		    </span>
	                		@endif
	                	</div>

	                	<button type="submit" class="btn btn-primary btn-flat pull-right" style="margin-top: 2em; margin-right: 1em;">Envoyer</button>
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