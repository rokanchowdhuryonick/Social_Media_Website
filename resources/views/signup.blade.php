<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="../css/signup.css"/>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    @foreach ($errors->all() as $error)
    {{$error}} <br>
     @endforeach

    <div class="cover">
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <form method="POST">
     @csrf 
      <div class="form-content">
        <div class="login-form" >
          <div class="title">SignUp</div>
          <div class="input-boxes" >
          
            <div class="input-box" >
             <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your name"  name="username" value="{{old('username')}}">
            
            </div> 
            <div class="input-box">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Enter your email"  name="usermail" value="{{old('usermail')}}">
           
            </div>
            <div class="input-box">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter your password" name="password" >
             
            </div>
            <div class="text"><a href="#">Forgot password?</a></div>
            <div class="button input-box">
              <a href="/login">
                <button class="login100-form-btn" type="submit">Submit</button>
                 </a>
              
            </div>
          </div>
        </div>
          </div>
        </div>
       
    </form>
</body>
</html>
