<!DOCTYPE html>
<html lang="en">
<head>
  <title>Score</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('js')}}/event.js"></script>
  <script src="{{asset('css')}}/style.css"></script>
  <style>
 .card {
   margin-left:10%;
   margin-right:10%;
 }

 .card-header{
  background-color:#343a40;
  color:white;
  font-size:20px;
 }
</style>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">FE TEST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item ">
        <a class="nav-link" href="/qualitative">Qualitative Analysis <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/comprehension">Comprehension</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/creativity">Creativity test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/analytical">Analytical Test</a>
      </li>
      </ul>
      <div class="navbar-collapse ">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <button type="button" class="btn btn-success nav-link" id="timer">60:00</button>
            </li>
            &nbsp;&nbsp;
            <li class="nav-item">
            <button type="button" class="btn btn-success nav-link">Submit Test</button>
            </li>
           
        </ul>
      </div>  
  </div>
</nav>

<br>

<br>

<br>

<div class="card">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h3 class="card-text">
<div class="alert alert-success" role="alert" style="width=60%;">
  {{$section}} section has been submitted.
</div></h3>
<div class="alert alert-danger" role="alert">
  Make sure you submit all the sections !
</div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs--;
        localStorage.setItem("time",totalSecs);
        $("#timer").text(currentMinutes + ":" + currentSeconds);
        setTimeout('incTimer()', 1000);
    }

    if(localStorage.getItem("time"))
    {totalSecs = localStorage.getItem("time");}
    else
    totalSecs=3600;

    $(document).ready(function() {
      
            incTimer();
    });

</script>
</body>
</html>