@extends('layout.template')

@section('main')
@include('layout.navbar')
<div class="content-wrapper">
  @yield('container')
</div>
@endsection
