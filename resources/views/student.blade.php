@extends('layouts.app')
@section('content')

<div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('layouts.message')
            <div class="panel panel-default">
            
                <div class="panel-heading">
                <h3><a href='{{URL::previous()}}' style='color:black'><span class='glyphicon glyphicon-chevron-left'></span></a>
                &nbsp;
                {{$user->name}}</h3></div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class='container'>
                        <table >
                        <tr>
                        <td><h3>Name</h3></td><td>{{$user->name}}</td></tr>
                        <tr>
                        <td><h3>Email Id</h3></td><td>{{$user->email}}</td></tr>
                        <tr>
                        <td><h3>Contact No.</h3></td><td>{{$user->phone}}</td></tr>
                        <tr>
                        <td><h3>Address</h3></td><td>{{$user->address}},{{$user->pin}}</td></tr>
                        <tr>
                        <td><h3>Percentile</h3></td><td>{{$user->percent}}</td></tr>
                        <tr>
                        <td><h3>DTE Application No.</h3></td><td>{{$user->dte}}</td></tr>
                        <tr>
                        <td><h3>Test Marks</h3></td><td>{{$result->marks}}</td></tr>
                        </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection