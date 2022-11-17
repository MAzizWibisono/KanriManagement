@extends('layout.main')

@section('title', 'Kanri | project_criteria')

@section('container')
@section('container')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Project Criteria</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active">Project Criteria</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">
        <a href="{{ url('/project_criteria/create') }}"> <button type="button" class="btn btn-primary">Add Project Criteria</button> </a>
      </h3> --}}

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button> --}}
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
          <th scope="col">Revenue (%)</th>
          <th scope="col">Benefit Cost Ratio (%)</th>
          <th scope="col">Budget (%)</th>
          <th scope="col">Resources (%)</th>
          <th scope="col">Project (%)</th>
          <th scope="col">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($project_criterias as $project_criteria)
          <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{ $project_criteria->revenue }}</td>
            <td>{{ $project_criteria->benefit_cost_ratio }}</td>
            <td>{{ $project_criteria->budget }}</td>
            <td>{{ $project_criteria->resources }}</td>
            <td>{{ $project_criteria->project_risk }}</td>

            <td>
              {{-- <a href="{{ url('/brand')."/".$brand->id."/hapus" }}"> --}}
                {{-- <a href="#">
                  <button type="submit" class="btn btn-danger delete" data-id="{{$brand->id}}" data-toggle="modal" data-target="#modal-danger">Delete</button>
                </a> --}}
              <a href="{{ url('/project_criteria')."/".$project_criteria->id."/edit" }}">
                <button type="submit" class="btn btn-danger">Edit</button>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      {{-- <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete it?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="#" id="link-delete">
                <button type="button" class="btn btn-outline-light">Yes, Delete!</button>
              </a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> --}}
      <!-- /.modal -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

@endsection

@push('js')
$(document).ready(function(){
  $(".delete").click(function(){ // Click to only happen on announce links
    var myBookId = $(this).data('id');
    $("#link-delete").attr( 'href', '{{ url('/brand')}}/'+myBookId+'/hapus' );
    //$('#createFormId').modal('show');
  });
});
@endpush
