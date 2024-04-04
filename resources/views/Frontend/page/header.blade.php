<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home.index')}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

       

        <li class="nav-item">
          <a class="nav-link" href="{{route('all.post')}}">Post</a>
        </li>



        @if(Route::has('login'))
        @auth

        <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
        @method("post")
        @csrf
          <!-- <a class="nav-link" href="{{ route('logout') }}">logout</a> -->
          <button type="submit">Logout</button>
          </form>
        </li>

            <!-- Authentication -->

            <!-- <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ ('Log Out') }}
                            </x-dropdown-link>
                        </form>

                        </li> -->

        @else


        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">register</a>
        </li>
      
      
      
      @endauth

      @endif


      </ul>
   
    </div>
  </div>
</nav>