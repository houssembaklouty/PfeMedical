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
          <h3 class="box-title">Ordennance</h3>

          <a href="{{ route('ordonnance.create') }}" class="btn btn-success pull-right">
            <i class="fa fa-pencil" aria-hidden="true"></i> NV. Ordennance</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>Patient</th>
              <th>Description</th>
              <th>Created_at</th>
              <th></th>
            </tr>

            @if(! $ordonnances-> isEmpty())

              @foreach($ordonnances as $ordonnance)
                <tr>
                  <td>{{ $ordonnance->id }}</td>
                  <td>{{ $ordonnance->patient->first_name }} {{ $ordonnance->patient->last_name }}</td>
                  <td>{{ str_limit($ordonnance->description, 100) }}</td>
                  <td>{{ $ordonnance->created_at }}</td>
                  <td>
                    <a href="{{ route('ordonnance.edit', $ordonnance->id) }}" 
                       class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</a>
                  </td>
                </tr>
              @endforeach

            @else
                <p>Aucun produit pour le moment.</p>
            @endif


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