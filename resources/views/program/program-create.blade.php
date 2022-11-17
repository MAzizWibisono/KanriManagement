@extends('layout.main')

@section('title', 'Program')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello, {{ Auth::user()->nama_lengkap }}</h1>
    <form method="POST" action="{{ url('program') }}">
      {{ csrf_field() }}

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Name</label>
        <div class="input-group mb-3">
            <input type="text" name="program_name" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Funder</label>
        <div class="input-group mb-3">
            <input type="text" name="program_funder" class="form-control">
          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Program Owner</label>
        <div class="input-group mb-3">
            <input type="text" name="program_owner" class="form-control">
          </div>
      </div>





      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
