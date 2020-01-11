<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCORE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('css')}}/style.css"></script>
</head>
<body>

<div class="card text-center">
  <div class="card-header">
     <b>Result</b>
  </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Section</th>
      <th scope="col">Marks</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Qualitative Analysis</td>
      <td><?php echo $count; ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Comprehension</td>
      <td><?php echo $count1;?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Creativity Test</td>
      <td><?php echo $count2;?></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Analytical test</td>
      <td><?php echo $count3;?></td>
    </tr>
  </tbody>
</table>
  <div class="card-footer text-muted">
   <p style="float:right;"> Total Score : <?php echo $count4=$count+$count1+$count2+$count3;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  </div>
</div>
<div class='container'>
  <button class='btn btn-default float-right'>
  <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();" class='glyphicon glyphicon-off'>
      Logout
  </a></button>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</div>
<script>
window.onload=function(){
  localStorage.clear();
}
$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
</script>
</body>
</html>