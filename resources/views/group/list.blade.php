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

  <a href="/job" class="w3-button w3-bar-item">Back</a>
</nav>

</head>
<body>
<h2>Group List</h2>
    <form action="" method="post">
    <table border="1">
    
   

    <tr>
    <td>Id</td>
    <td>Username</td>
    <td>Group Name</td>
    <td>email</td>
    <td>Action</td>

    
 
    </tr>

  @foreach($grouplist as $create_group) 
  

    <tr>
    <td>{{$create_group['id']}}</td>
    <td>{{$create_group['uname']}}</td>
    <td>{{$create_group['group_name']}}</td>
    <td>{{$create_group['email']}}</td>
    <td>
    <a href="/group/details/{{$create_group['id']}}">Detils</a>
    <a href="/group/edit/{{$create_group['id']}}">edit</a>
    <a href="/group/delete/{{$create_group['id']}}">delete</a>
    </td>
   
 
    </tr>
   @endforeach

  

   
    </table>
    
    </form>
</body>
</html>