@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Teachers</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                    {!!Form::open(['action'=>'TeacherController@store','method'=>'POST'])!!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{Form::label('name','Name')}}
                            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          {{Form::label('email','Email')}}
                          {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                          @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          {{Form::label('phone','Contact No.')}}
                          {{Form::tel('phone','',['class'=>'form-control','placeholder'=>'Contact No.'])}}
                          @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          {{Form::label('password','Password')}}
                          {{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password'])}}
                          @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class='form-group'>
                          {{Form::hidden('role', '1')}}
                          </div>
                          <div class='form-group'>
                          {{Form::hidden('address', '')}}
                          </div>
                          <div class='form-group'>
                          {{Form::hidden('pin', '')}}
                          </div>
                          <div class='form-group'>
                          {{Form::hidden('dte', '')}}
                          </div>
                          <div class='form-group'>
                          {{Form::hidden('percent', '')}}
                          </div>
                          <div> {{Form::submit('ADD', ['class' => 'btn btn-primary'])}}</div>
                        {!!Form::close()!!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection