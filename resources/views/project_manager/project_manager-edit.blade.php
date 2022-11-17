@extends('layout.main')

@section('title', 'Project Manager')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-10">
    <h1 class="mt-3">Hello,</h1>
    <form method="POST" action="{{ url('project_manager', $project_manager->id) }}">
      {{ csrf_field() }}
      @method('PUT')

      <div class="input-group mb-3">
        <label for="exampleInputtext">Nama Lengkap</label>
        <div class="input-group mb-3">
            <input type="text" name="nama_lengkap" value ="{{ $project_manager->nama_lengkap }}" class="form-control">

          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">E-mail</label>
        <div class="input-group mb-3">
            <input type="email" name="email" value ="{{ $project_manager->email }}" class="form-control">

          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Password</label>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control">

          </div>
      </div>

      <div class="input-group mb-3">
        <label for="exampleInputtext">Mandays</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">$</span>
            <input type="number" name="mandays" value ="{{ $project_manager->mandays }}"class="form-control " min="0">
            <span class="input-group-text" id="basic-addon2">/days</span>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>

@endsection
