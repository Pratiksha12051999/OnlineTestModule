@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, {{ Auth::user()->name }} </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                    <h3>
	<p>	1.Participant should reach examination room at least 10 minutes before the scheduled time. 
		No additional time shall be &nbsp;&nbsp;&nbsp;given to Participant arriving late.
		Participant who has short attendance in any of the course(s) shall not be allowed to &nbsp;&nbsp;&nbsp;sit 
		in the examination room.
		DON'T BRING YOUR MOBILE PHONE AND ANY OTHER UNAUTHORIZED &nbsp;&nbsp;&nbsp;ELECTRONIC GADGETS!
	</p>
	<p>
		2.If you bring it to an exam, you should be aware of the following:
		<br>&nbsp;&nbsp;&nbsp;i. The University of Management and Technology accepts no responsibility for any loss or 
		damage to your belongings.
		<br>&nbsp;&nbsp;&nbsp;ii. On finding any of the unauthorized electronic gadgets, can lead the participant to 
		Unfair Means Case.
	</p>
	<p>
		3.Participant must maintain complete silence in the examination room. If a participant has 
		any kind of query he/she &nbsp;&nbsp;&nbsp;should raise his/her hand and wait for the invigilator.
		Lending/borrowing of pen, pencil, ruler, calculator, etc. is strictly &nbsp;&nbsp;&nbsp;prohibited in the 
		examination room.
		Participant must display UMT ID Card.
	</p>
	<p>
		4.Participant must maintain complete silence in the examination room. If a participant has 
		any kind of query he/she &nbsp;&nbsp;&nbsp;should raise his/her hand and wait for the invigilator.
		Lending/borrowing of pen, pencil, ruler, calculator, etc. is strictly &nbsp;&nbsp;&nbsp;prohibited in the 
		examination room.
		Participant must display UMT ID Card.
	</p>
	</h3>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button onclick="location.href='{{ url('qualitative') }}'"  id="btn"><b>Start Exam</b></button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
