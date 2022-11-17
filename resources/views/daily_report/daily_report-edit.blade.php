@extends('layout.main')

@section('title', 'daily_report')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello,</h1>
    <form method="POST" action="{{ url('daily_report', $daily_report->id) }}">
      {{ csrf_field() }}
        @method('PUT')

      <div class="input-group mb-3">
        <label for="exampleInputtext">Project</label>
        <div class="input-group mb-3">
            <select name="project_id" class="form-control" id="project_id">
                <option value="{{$project->id}}">{{$project->project_name}}</option>
              </select>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">User</label>
        <div class="input-group mb-3">
            <select name="user_id" class="form-control" id="user_id">
                <option value="{{$daily_report->id}}">{{$daily_report->user->nama_lengkap}}</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->nama_lengkap}}</option>
                @endforeach
              </select>
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Description Report</label>
        <div class="input-group mb-3">
            <textarea class="form-control" name="desc_report" id="floatingTextarea">{{$daily_report->desc_report}}</textarea>
          </div>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
