<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<body>

<!-- Content will go here -->
<!-- Navigation -->

<form method="post">
{{csrf_field()}}
<nav class="w3-bar w3-black">
  <a href="/home" class="w3-button w3-bar-item">Home</a>
 
  
  
  <a href="/logout" class="w3-button w3-bar-item">Logout</a>

  <a href="/job" class="w3-button w3-bar-item">Back</a>
</nav>

</head>

<div>
<h3>CREATE JOB POST</h3>
</div >
<div Class="container">
<div>
<label for="title"><b>Job Id</b></label>
</div>

<textarea name="id" form="usrform"></textarea>


<div>
<label for="title"><b>TITLE</b></label>
</div>


<textarea name="title" form="usrform" ></textarea>

<div>
<label for="title"><b>Salary</b></label>
</div>

<textarea name="salary" form="usrform"></textarea>


<div class="descrip">
<label for="title" ><b>Description</b></label>
</div>

<textarea rows="12" cols="30" name="address" id="address" name="description"></textarea>

</div>
<button href="/job">Add Job </button>


</form>
@if(Session::has('msg2'))
                <div class="alert alert-success" role="alert" style="width:20%">
                    {{ Session::get('msg2') }}
                </div>
                @endif



<style>

.container{
padding: 16px;
width:70%;
height:60%;
margin-left:15%;

background:#F8F8E3;
 

}
.discrip{
    margin-top:50px;
    width:100%;
  
}
h3{
    margin-left:15%;
}
button:hover {
  opacity: 0.8;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 8px 60px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 5%;
  margin-left:75%;
}
textarea{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
</style>
</html>