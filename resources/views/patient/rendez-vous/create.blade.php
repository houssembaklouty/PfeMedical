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

	            <form method="POST" action="{{ route('rendez-vous.store') }}">
	                @csrf

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
	                		<input id="heure" name="heure" class="form-control" type="time" value="{{ old('heure') }}" required>

	                		@if ($errors->has('heure'))
	                		    <span class="invalid-feedback" role="alert">
	                		        <strong>{{ $errors->first('heure') }}</strong>
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