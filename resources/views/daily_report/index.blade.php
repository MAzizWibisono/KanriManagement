@extends('layout.main')

@section('title', 'Kanri | daily_report')

@section('container')
@section('container')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daily Report</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/program',$project->program->id)}}">{{$project->program->program_name}}</a></li>
            <li class="breadcrumb-item"><a href="{{url("project/".$project->id)}}">{{$project->project_name}}</a></li>
          <li class="breadcrumb-item active">Daily Report</li>
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
      <h3 class="card-title">
        <a href="{{ url('project/'.$project->id.'/daily_report/create') }}"> <button type="button" class="btn btn-primary">Add Daily Report</button> </a>
      </h3>

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
            <th scope="col">Project</th>
            <th scope="col">User</th>
            <th scope="col">Description Report</th>
            <th scope="col">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($project->daily_reports as $daily_report)
          <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{ $daily_report->user->nama_lengkap }}</td>
            <td>{{ $daily_report->project->project_name }}</td>
            <td>{{ $daily_report->desc_report}}</td>

            <td>
              {{-- <a href="{{ url('/project_sdm')."/".$project_sdm->id."/hapus" }}"> --}}
                {{-- <a href="#">
                  <button type="submit" class="btn btn-danger delete" data-id="{{$daily_report->id}}" data-toggle="modal" data-target="#modal-danger">Delete</button>
                </a>
                <div class="modal fade" id="modal-danger">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete report</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure want to delete it?&hellip;</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <form method="POST" action="{{ url('daily_report', $daily_report->id) }}">
                                {{ csrf_field() }}
                                @method('DELETE')

                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                          <a href="#" id="link-delete">
                            <button type="submit" class="btn btn-outline-light">Yes, Delete!</button>
                          </a> --}}
                        {{-- </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> --}}
                  <!-- /.modal -->
              <a href="{{ url("project/$project->id/daily_report/$daily_report->id/edit")}}">
                <button type="submit" class="btn btn-info">Edit</button>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>


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
{{-- $(document).ready(function(){
  $(".delete").click(function(){ // Click to only happen on announce links
    var myBookId = $(this).data('id');
    $("#link-delete").attr( 'href', '{{ url('/brand')}}/'+myBookId+'/hapus' );
    //$('#createFormId').modal('show');
  });
}); --}}
@endpush
