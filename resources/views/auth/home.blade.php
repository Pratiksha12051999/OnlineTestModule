<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <link rel="icon" href="images/veslogo.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>

 img{
  height:250px;
  width:100%;
  border-radius:25px;
  }

/* div [class="col-"]{
  padding-left:50px;
  padding-right:50px;
} */
.card{
  transition:0.5s;
  cursor:pointer;
  border-radius:25px;
  background-color:white;
  float:center;
}
.card-title{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
}
.card-title i{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
  
}
.card-title i:hover{
  transform: scale(1.25) rotate(100deg);
  color:#18d4ca;
 
}
.card:hover{
  transform: scale(1.05);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.5);
}
.card-text{
  height:8px;  
}

.card::before {
  position: absolute;
  text-decoration:NULL;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: rgba(233, 229, 229, 0.1);
  content: '';
  pointer-events: none;
}

.card::after{
  position: absolute;
  top: 0;
  text-decoration:NULL;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: transparent;
  border-radius:25px;
  pointer-events: none;
  }
.card::before {
  transform-origin: left top;
}
.card::after {
  font-weight:bold;
  transform-origin: center;
}
.card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
  transform: scale3d(1, 1, 1);
}

.new_test::after{
 /* content: 'Create new test'; */
 color:black;
 text-decoration:NULL;
 font-size:20px;
 font-weight: 500;
 display: flex;
 align-items:center;
 justify-content:center;
}

body{
margin: 0;
padding: 0;
}
body:before{
content: '';
position: fixed;
width: 100vw;
height: 100vh;
background-image: url("images/build.png");
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
-webkit-filter: blur(5px);
-moz-filter: blur(5px);
-o-filter: blur(5px);
-ms-filter: blur(5px);
filter: blur(5px);
}
.navbar-fixed-top{
height:50px;
}
.pos{
  padding-top:70px;
}
  </style>
</head>
<body> 

<!-- Navigation bar code-->

<nav class="navbar navbar-default navbar-expand-md bg-primary shadow-sm">
    <!--navbar settings-->
    <div class="container">
            <div class="navbar-header">
            <a class="navbar-brand glyphicon glyphicon-home" href="{{ url('/home') }}">&nbsp;Home
                    </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <div class="container">
            <div class="nav navbar-nav navbar-right">
            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class='glyphicon glyphicon-off'>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
            </div>
</div>
    </div>
</nav>
 
 <!-- Code for Cards-->
 
  
<div class="container mt-2">

 
  <div class="row">
 <div class='pos'>
   <div class="col-sm-6 col-lg-3 mb-3">
    <a href="/registeradmin" class="custom-card">
      <div class="card card-block h-55 new_test">
        <img src="images/admin.png">
		<div class="alert alert-info fade in text-center" role="alert"> <b> Admin settings</b></div>
      </div>
	 </a>
  </div> 
  
  
   {{-- <div class="col-sm-7 col-lg-3 mb-3">
	<a href="https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp" class="custom-card">
      <div class="card card-block  h-55 new_test">
           <img src="images/new.png">
		   <div class="alert alert-info fade in text-center" role="alert"> <b> Create new test</b></div>
      </div>
	</a>
   </div> --}}
	

   <div class="col-sm-7 col-lg-3 mb-3">
	 <a href="test_display" target="_blank" class="custom-card">
      <div class="card card-block h-55 new_test">
        <img src="images/existing.png">
	    <div class="alert alert-info fade in text-center" role="alert"> <b> Create new test or Edit existing test</b></div>
      </div>
	 </a>
   </div>
	

	<div class="col-sm-7 col-lg-3 mb-3">
	  <a href="/result" class="custom-card">
        <div class="card card-block h-55 new_test">
          <img src="images/result.png">
		  <div class="alert alert-info fade in text-center" role="alert"> <b> View Result</b></div>
        </div>
	  </a>
    </div>
</div>
  </div>
</div>

</body>
</html>
