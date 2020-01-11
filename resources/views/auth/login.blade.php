@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style='font-size:50px;text-align:center'><img class='content' width='100' src='data:image/png;base64,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'>
                Fe Test Module
</div><div class='panel-heading' style='text-align:center;'>Login</div>

                <div class="panel-body">
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <br><br><br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary " >
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                        </div></div>

                        <!-- Register route -->
                        <div class='form-group'><div class="col-md-6 col-md-offset-4">
                        Not Registered? <a href="/register">Click here!</a></div><div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
