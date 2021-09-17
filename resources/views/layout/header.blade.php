 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Blog with Robi</a>
      <button id='menu' class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i   class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse  ml-auto" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
        
          
          @auth()
          <li class="nav-item">
            <a class="nav-link" href="">Profile({{auth()->user()->full_name}})</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Log Out</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('dashbord')}}">Dashbord</a>
          </li>
       

          @endauth

          @guest()

          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          @endguest
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>