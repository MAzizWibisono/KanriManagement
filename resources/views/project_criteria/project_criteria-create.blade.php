@extends('layout.main')

@section('title', 'project_criteria')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello,</h1>
    <form method="POST" action="{{ url('project_criteria') }}">
      {{ csrf_field() }}

      <div class="input-group mb-3">
        <label for="exampleInputtext">Revenue</label>
        <div class="input-group mb-3">
            <input type="number" name="revenue" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Benefit Cost Ratio</label>
        <div class="input-group mb-3">
            <input type="number" name="benefit_cost_ratio" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Budget</label>
        <div class="input-group mb-3">
            <input type="number" name="budget" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Resources</label>
        <div class="input-group mb-3">
            <input type="number" name="resources" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>



      <div class="form-group">
        <label for="exampleInputtext">Project Risk</label>
        <div class="input-group mb-3">
            <input type="number" name="project_risk" class="form-control" min="0" max="100">
            <span class="input-group-text" id="basic-addon2">%</span>
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
