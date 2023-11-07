<div class="header_section">
         <div class="header_main">
            <div class="container-fluid">
               <div class="logo"><a href="{{ url('/') }}"><img src="" style="display: block; margin: 0 auto;"></a></div>
               <div class="menu_main">
                  <ul>

                     <li><a href="{{ url('/') }}">Home</a></li>
                     
                     @if (Route::has('login'))

                     @auth

                        <li><a href="{{ url('my_url') }}">My List URL</a></li>

                        <li><a href="{{ url('create_url') }}">Add New URL</a></li>

                        <li><x-app-layout></x-app-layout></li>

                     @else

                        <li><a href="{{ route('login') }}">Login</a></li>

                        <li><a href="{{ route('register') }}">Register</a></li>

                     @endauth

                     @endif

                  </ul>
               </div>
            </div>
         </div>