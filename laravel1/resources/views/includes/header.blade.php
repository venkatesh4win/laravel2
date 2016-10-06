  <header>
  	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if(Auth::check())
      
          <a class="navbar-brand" href="{{route('dashboard')}}">DashBoard</a>
      
      @else
      
         <h2>Welcome</h2>
      
      @endif
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
    @if(Auth::check())
    <li><a href="#"><h4>  {{ Auth::user()->first_name }} </h4></a></li>
    <li><a href="{{route('account')}}"><h4>Account</h4></a></li>
        <li ><a href="{{route('logout')}}"><h4>Logout</h4></a></li>
    @else
       <li><a href="#"><h3>  Here we go</h3></a></li>
       @endif 
        
      </ul>
    </div>
    </div>
    </nav>
  </header>