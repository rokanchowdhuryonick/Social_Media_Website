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
<h2>Add To Group</h2>
    <form action="" method="post">
    {{csrf_field()}}
    <table>
    <tr>
    <td>UserName</td>
    <td><input type="text" name="uname"></td>
    </tr>

    <tr>
    <td>Group Name</td>
    <td><input type="text" name="group_name"></td>
    </tr>
    
    <tr>
    <td>Email</td>
    <td><input type="email" name="email"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="ADD TO GROUP" href="/group/create" ></td>
   
    </tr>
    </table>
    
    </form>
    @if(Session::has('msssg'))
                <div class="alert alert-success" role="alert" style="width:20%">
                    {{ Session::get('msssg') }}
                </div>
                @endif

</body>
</html>