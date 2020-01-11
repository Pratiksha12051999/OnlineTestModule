@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('layouts.message')
            <div class="panel panel-default">
            
                <div class="panel-heading">Teachers</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    
                    @if(count($users) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th><th></th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    
                                    {!!Form::open(['action' => ['TeacherController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no Teachers</p>
                    @endif
                    <button class='btn btn-primary' onclick="location.href='/addteacher'">ADD TEACHER</button>
            
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection