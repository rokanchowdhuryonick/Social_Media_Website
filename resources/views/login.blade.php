<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  

	</head>
<body>

<form method="post">
{{csrf_field()}}
<div class="upper-body">
<h1 style="text-align:center"><span class="dot"></span> CoNNeCt</h1>
<h4 style="text-align:center">Make The Most Of Your Professional Life</h4>
</div>
  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" >

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password">

   
	<button href="/home">Login </button>
  

	
	
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <span class="forgetpass">Forgot <a href="#">password?</a></span>
  </div>

  <div class="container" style="background-color:#F8F8E3">
  <span class="signup">new to .CoNNeCt?  <a href="/registration">Sign up</a></span>
   
  </div>
  
 
</form>
<div class="sesss">
{{session('mssg')}}<br>
@foreach($errors->all() as $error)
{{$error}}<br>
@endforeach
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>




<style>

form {
  border: 3px solid #f1f1f1;
}
.forgetpass{
      margin-left:88px;
  }
  .sesss{
    color:red;
    text-align:center;
    font-size:30px;

  }
  .dot{
	 
	height: 20px;
   width: 20px;
   background-color: #04AA6D;
  border-radius: 50%;
  display: inline-block;
}
  h1{
	  color:#04AA6D;
	  margin-top:40px;
  }
  h4{
	  margin-bottom:30px;
  }
  
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin:  0;
  display: in8pxline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
  width:30%;
  margin-left:35%;
  background:#F8F8E3;
 
}
.upper-body{
  padding: 16px;
  width:50%;
  margin-left:25%;


}






</style>
</html>
