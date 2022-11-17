@extends('layout.main')

@section('title', 'Program')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello, {{ Auth::user()->nama_lengkap }}</h1>
    <form method="POST" action="{{ url('program', $program->id) }}">
      {{ csrf_field() }}
      @method('PUT')

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Name</label>
        <div class="input-group mb-3">
            <input type="text" name="program_name" value ="{{ $program->program_name }}" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Funder</label>
        <div class="input-group mb-3">
            <input type="text" name="program_funder" value ="{{ $program->program_funder }}" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Owner</label>
        <div class="input-group mb-3">
            <input type="text" name="program_owner" value ="{{ $program->program_owner}}" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Status</label>
        <div class="input-group mb-3">
            <select name="status" class="form-control">
                <option value="{{$program->status}}">{{$program->status}}</option>
                <option value="PENDING">PENDING</option>
                <option value="ON GOING">ON GOING</option>
                <option value="COMPLETE">COMPLETE</option>
              </select>
          </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
