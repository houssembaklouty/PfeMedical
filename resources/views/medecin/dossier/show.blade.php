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


    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dossier</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>Patient</th>
              <th>Ordennance description</th>
              <th>Created_at</th>
              <th></th>
            </tr>

            @forelse($dossiers->ordonnance as $ord)
                <tr>
                  <td>{{ $ord->id }}</td>
                  <td>{{ $dossiers->first_name }} {{ $dossiers->last_name }}</td>
                  <td>{{ str_limit($ord->description, 100) }}</td>
                  <td>{{ $dossiers->created_at }}</td>
                  <td>
                    <a href="{{ route('dossier.edit', $ord->id) }}" 
                       class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</a>
                  </td>
                </tr>
            @empty
              <center>
                <p class="btn btn-danger">Dossier Vide.</p> <br><br>
              </center>
            @endforelse



          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="pagination pagination-sm no-margin pull-right">
            
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