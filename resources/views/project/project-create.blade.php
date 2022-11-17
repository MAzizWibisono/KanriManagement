@extends('layout.main')

@section('title', 'Project')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello, {{ Auth::user()->nama_lengkap }}</h1>
    <form method="POST" action="{{ url('project') }}">
      {{ csrf_field() }}

      <div class="input-group mb-3">
        <label for="exampleInputtext">Project Name</label>
        <div class="input-group mb-3">
            <input type="text" name="project_name" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Project Description</label>
        <div class="input-group mb-3">
            <input type="text" name="project_desc" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program</label>
        <div class="input-group mb-3">
            <select name="program_id" class="form-control" id="program_id">
                @foreach ($programs as $program)
                <option value="{{$program->id}}">{{$program->program_name}}</option>
                @endforeach

              </select>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Project Manager</label>
        <div class="input-group mb-3">
            <select name="project_manager_id" class="form-control" id="project_manager_id">
                @foreach($project_managers as $project_manager)
                <option value="{{$project_manager->id}}">{{$project_manager->nama_lengkap}}</option>
                @endforeach
              </select>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Start Date</label>
        <div class="input-group mb-3">
            <input type="date" name="start_at" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Finish Date</label>
        <div class="input-group mb-3">
            <input type="date" name="finish_at" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Estimated Budget</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="estimated_budget" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Mandays</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="mandays" class="form-control " min="0">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Rating Revenue  (1 = Small...5 = Very Big)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"></span>
            <input type="number" name="rating_revenue" class="form-control " min="1" max="5">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Rating BCR  (1 = Small...5 = Very Big)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"></span>
            <input type="number" name="rating_benefit_cost_ratio" class="form-control " min="1" max="5">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Rating Budget  (1 = Small...5 = Very Big)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"></span>
            <input type="number" name="rating_budget" class="form-control " min="1" max="5">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Rating Resources  (1 = Small...5 = Very Big)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"></span>
            <input type="number" name="rating_resources" class="form-control " min="1" max="5">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Rating Project Risk (1 = Small...5 = Very Big)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"></span>
            <input type="number" name="rating_project_risk" class="form-control " min="1" max="5">
          </div>
      </div>

      {{-- <div class="input-group mb-3">
        <label for="exampleInputtext">Revenue</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="revenue" class="form-control " min="0">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">New Revenue</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="new_revenue" class="form-control " min="0">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Add On Revenue</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="add_on_revenue" class="form-control " min="0">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Component Benefit Matrix Revenue</label>
        <div class="input-group mb-3">
            <input type="number" name="component_benefit_matrix_revenue" class="form-control " min="0" max="{{100-$program->projects->sum('component_benefit_matrix_revenue')}}">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Component Benefit Matrix New Revenue</label>
        <div class="input-group mb-3">
            <input type="number" name="component_benefit_matrix_new_revenue" class="form-control " min="0" max="{{100-$program->projects->sum('component_benefit_matrix_new_revenue')}}">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Component Benefit Matrix Add On Revenue</label>
        <div class="input-group mb-3">
            <input type="number" name="component_benefit_matrix_add_on_revenue" class="form-control " min="0" max="{{100-$program->projects->sum('component_benefit_matrix_add_on_revenue')}}">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div> --}}


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
