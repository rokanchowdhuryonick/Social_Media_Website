<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<body>

<!-- Content will go here -->
<!-- Navigation -->
<nav class="w3-bar w3-black">
  <a href="/home" class="w3-button w3-bar-item">Home</a>
 
  
  
  <a href="/logout" class="w3-button w3-bar-item">Logout</a>

  <a href="/group/list" class="w3-button w3-bar-item">Back</a>
</nav>

</head>
<body>
<h2>Details</h2>
    <form action="" method="post">
    {{csrf_field()}}
    
    <table border="1">
    
   
  
 
    <tr>
    <td>Id</td>
    <td>{{$data['id']}}</td>
    </tr>

    <tr>
    <td>Username</td>
    <td>{{$data['uname']}}</td>
    </tr>

    <tr>
    <td>email</td>
    <td>{{$data['email']}}</td>
    </tr>

    <tr>
    <td>Group Name</td>
    <td>{{$data['group_name']}}</td>
    </tr>
   
     </table>
     
     </form>
     </body>
</html>