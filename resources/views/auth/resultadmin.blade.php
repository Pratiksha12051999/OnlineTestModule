@extends('layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('layouts.message')
            <div class="panel panel-default">
            
                <div class="panel-heading">Result</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    @if(count($result) > 0)
                    
                        <table class="table table-striped">
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Qualitative</th>
                            <th>Comprehension</th>
                            <th>Creativity</th>
                            <th>Analytical</th>
                            <th>Total Marks</th>
                            <th></th>
                            </tr>
                            @foreach( $result as $res)                           
                            <tr>
                                <td>{{$res->id}}</td>
                                <td><a href='student/{{$res->id}}'>{{$res->name}}</a></td>
                                <td>{{$res->email}}</td>
                                <td>{{$res->QUALT}}</td>
                                <td>{{$res->COMPT}}</td>
                                <td>{{$res->CREAT}}</td>
                                <td>{{$res->ANALT}}</td>
                                <td>{{$res->marks}}</td>
                            </tr>                           
                            @endforeach
                        </table>

                    @else
                    <p>No students have given the test yet</p>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection