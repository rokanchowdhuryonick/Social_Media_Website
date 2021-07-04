<!-- Header -->
<header id="header">
  <nav class="navbar navbar-default navbar-fixed-top menu">
    <div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/dashboard">dotConnect</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right main-menu">
          <li class="dropdown"><a href="/dashboard">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Newsfeed <span><img src="{{asset('images/down-arrow.png')}}" alt="" /></span></a>
            <ul class="dropdown-menu newsfeed-home">
              <li><a href="newsfeed.html">Newsfeed</a></li>
              <li><a href="newsfeed-friends.html">My friends</a></li>
              <li><a href="newsfeed-messages.html">Chatroom</a></li>
              <li><a href="newsfeed-images.html">Images</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Timeline <span><img src="{{asset('images/down-arrow.png')}}" alt="" /></span></a>
            <ul class="dropdown-menu login">
              <li><a href="timeline.html">Timeline</a></li>
              <li><a href="timeline-about.html">Timeline About</a></li>
              <li><a href="timeline-album.html">Timeline Album</a></li>
              <li><a href="timeline-friends.html">Timeline Friends</a></li>
            </ul>
          </li>
          @if (Session::get('user_type')=='admin')
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">Admin Settings <span><img src="{{asset('images/down-arrow.png')}}" alt="" /></span></a>
              <ul class="dropdown-menu login">
                <li><a href="/country">Country List</a></li>
                <li><a href="/restictedWord">Resticted Words</a></li>
                <li><a href="/users">Users List</a></li>
                <li><a href="/admin">Admins List</a></li>
                <li><a href="/notice">Notice</a></li>
                <li><a href="/jobs">Jobs</a></li>
              </ul>
            </li>
          @endif
          @if (Session::has('logged_in'))
            <li class="dropdown"><a href="/logout">Logout</a></li>
          @endif
          
        </ul>
        <form class="navbar-form navbar-right hidden-sm">
          <div class="form-group">
            <i class="icon ion-android-search"></i>
            <input type="text" class="form-control" placeholder="Search friends, photos, videos">
          </div>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>
<!--Header End-->
