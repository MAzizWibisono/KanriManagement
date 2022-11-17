@extends('layout.template')

@section('main')
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href="../../index2.html"><b></b>KANRI </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start </p>

            <form method="POST" action="{{ url('login') }}">
                {{ csrf_field() }}
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">

                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            {{-- <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p> --}}

          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
</div>
@endsection
