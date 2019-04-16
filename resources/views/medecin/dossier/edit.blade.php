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
          <h3 class="box-title">Update Ordennance de :
            <strong>{{ $ordonnance->patient->first_name }} {{ $ordonnance->patient->last_name }}</strong>
          </h3>

          <span class="pull-right"><strong>Date : </strong> {{ now() }}</span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

	          <div class="register-box-body">

	            <form method="POST" action="{{ route('ordonnance.update', $ordonnance->id) }}">
                  <input type="hidden" name="_method" value="PUT">
                  {{ csrf_field() }}

	              <div class="form-group">
	                <label for="comment">Note:</label>
	                <textarea class="form-control" rows="10" name="description">{{ $ordonnance->description }}</textarea>
	              </div>

	              <div class="row">
	                <div class="col-xs-8">
	                </div>
	                <!-- /.col -->
	                <div class="col-xs-4">
	                  <button type="submit" class="btn btn-primary btn-block btn-flat">Mises à jour</button>
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