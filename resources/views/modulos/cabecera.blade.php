  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datos') }}" role="button">
          {{ auth()->user()->name }}
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" role="button">
          
          <i class="fas fa-sign-out-alt"></i>
        </a>

        <form method="post" id="logout-form" action="{{ route('logout') }}">

          @csrf
          
        </form>

      </li>
    </ul>
  </nav>