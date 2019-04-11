@extends('pateint.layouts.master')

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


    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Patients</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Created_at</th>
            </tr>

			@foreach($RendezVous as $RDV)
            <tr>
              <td>{{ $RDV->id }}</td>
              <td>{{ $RDV->first_name }}</td>
              <td>{{ $RDV->last_name }}</td>
              <td>{{ $RDV->email }}</td>
              <td>{{ $RDV->address }}</td>
              <td>{{ $RDV->created_at }}</td>
            </tr>
            @endforeach


          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="pagination pagination-sm no-margin pull-right">
          	{{ $links }}
          </div>
        </div>
      </div>
      <!-- /.box -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->

@endsection