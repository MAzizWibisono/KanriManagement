@extends('layout.main')

@section('title', 'Kanri | Project')

@section('container')
@section('container')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Project</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active">Project</li>
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
        <a href="{{ url('/project/create') }}"> <button type="button" class="btn btn-primary">Add Project</button> </a>
        <a href="{{ url('/project') }}?orderBy=score"> <button type="button" class="btn btn-primary">Calculate</button> </a>
      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button> --}}
      </div>
    </div>
    <div class="card-body p-0 ">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Ranking</th>
          <th scope="col">Project Name</th>
          <th scope="col">Project Description</th>
          <th scope="col">Program</th>
          <th scope="col">Project Manager</th>
          <th scope="col">Estimated Budget ($)</th>
          <th scope="col">Start Date</th>
          <th scope="col">Finish Date</th>
          <th scope="col">Mandays</th>
          <th scope="col">Score</th>
          <th scope="col">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
          <tr>
            <td scope="row">{{request()->filled('orderBy')?$loop->iteration:'-'}}</td>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->project_desc }}</td>
            <td>{{ $project->program->program_name }}</td>
            <td>{{ $project->project_manager->nama_lengkap }}</td>
            <td>{{ number_format($project->estimated_budget) }}</td>
            <td>{{ $project->start_at }}</td>
            <td>{{ $project->finish_at }}</td>
            <td>{{ $project->mandays }}</td>
            <td>{{ $project->score }}</td>
            <td>


                <a href="{{ url('/project')."/".$project->id}}">
                    <button type="submit" class="btn btn-warning">SDM</button>
                  </a>

              <a href="{{ url('project')."/".$project->id."/edit" }}">
                <button type="submit" class="btn btn-info">Edit</button>
              </a>

              <a href="#">
                <button type="submit" class="btn btn-danger delete" data-id="{{$project->id}}" data-toggle="modal" data-target="#modal-danger{{$project->id}}">Delete</button>
              </a>
              <div class="modal fade" id="modal-danger{{$project->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                      <div class="modal-header">
                        <h4 class="modal-title">Delete User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure want to delete it?&hellip;</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <form method="POST" action="{{ url('project', $project->id) }}">
                              {{ csrf_field() }}
                              @method('DELETE')

                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <a href="#" id="link-delete">
                          <button type="submit" class="btn btn-outline-light">Yes, Delete!</button>
                        </a>
                          </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <a href="#">
                    <button type="submit" class="btn btn-secondary delete" data-id="{{$project->id}}" data-toggle="modal" data-target="#modal-info{{$project->id}}">Detail Scoring</button>
                  </a>
                  <div class="modal fade" id="modal-info{{$project->id}}">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-info">
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Scoring</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                  <th scope="col" colspan="2">Revenue (%) x Rating Revenue</th>
                                  <th scope="col" colspan="2">Benefit Cost Ratio (%) x Rating Benefit Cost Ratio</th>
                                  <th scope="col" colspan="2">Budget (%) x Rating Budget</th>
                                  <th scope="col" colspan="2">Resources (%) x Rating Resources</th>
                                  <th scope="col">Project (%) x Rating project</th>
                                  <th scope="col">Scoring </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($project_criterias as $project_criteria)
                                  <tr>
                                    <td style="text-align:center" colspan="2">{{ $project_criteria->revenue }}% x {{$project->rating_revenue}}</td>
                                    <td style="text-align:center" colspan="2">{{ $project_criteria->benefit_cost_ratio }}% x {{$project->rating_benefit_cost_ratio}}</td>
                                    <td style="text-align:center" colspan="2">{{ $project_criteria->budget }}% x {{$project->rating_budget}}</td>
                                    <td style="text-align:center" colspan="2">{{ $project_criteria->resources }}% x {{$project->rating_resources}}</td>
                                    <td style="text-align:center">{{ $project_criteria->project_risk }}% x {{$project->rating_project_risk}}</td>

                                    <td style="text-align:center;vertical-align:middle" rowspan="2">
                                        {{$project->score}}
                                    </td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td style="text-align:right">{{ $project_criteria->revenue * (1/100) * $project->rating_revenue}}</td>
                                  <td style="text-align:right"> + </td>
                                  <td style="text-align:right">{{ $project_criteria->benefit_cost_ratio * (1/100) * $project->rating_benefit_cost_ratio}}</td>
                                  <td style="text-align:right"> + </td>
                                  <td style="text-align:right">{{ $project_criteria->budget * (1/100) * $project->rating_budget}}</td>
                                  <td style="text-align:right"> + </td>
                                  <td style="text-align:right">{{ $project_criteria->resources * (1/100) * $project->rating_resources}}</td>
                                  <td style="text-align:right"> + </td>
                                  <td style="text-align:right">{{ $project_criteria->project_risk * (1/100) * $project->rating_project_risk}}</td>


                                </tr>
                                </tbody>
                              </table>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>

                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

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
    $("#link-delete").attr( 'href', '{{ url('/project')}}/'+myBookId+'/hapus' );
    //$('#createFormId').modal('show');
  });
});
@endpush
