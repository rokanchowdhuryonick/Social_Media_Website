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
<h2>Edit Group</h2>
    <form action="" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$data['id']}}">
    <table>
    <tr>
    <td>UserName</td>
    <td><input type="text" name="uname" value="{{$data['uname']}}" ></td>
    </tr>

    <tr>
    <td>Group Name</td>
    <td><input type="text" name="group_name"value="{{$data['group_name']}}" ></td>
    </tr>
    
    <tr>
    <td>Email</td>
    <td><input type="email" name="email"value="{{$data['email']}}" ></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="Update" href="/group/create" ></td>
   
    </tr>
    </table>
    
    
    </form>
 
   
</body>
</html>