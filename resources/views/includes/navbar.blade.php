
    <link href="{{asset('/bootstrap4.1-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap4.1-dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 <script src="{{asset('bootstrap4.1-dist/fonts')}}"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
<div class="container-fluid p-2">
      
  <div class="row">
        
        <div class="col-md-12 ">
          <div class="header-title">
            <h1 class="navbar-link">
              <a href="{{url('/')}}" class="title-beat">Beatsys</a>
            </h1>

            <h6><b>Play and win wherever you are!</b></h6>
          </div>
        
         
         
         <!-- Esto esta aqui porque el login no me sirve, pero estos links tambien estan e home.blade.php, asi que cuando arregle esas vistas, los puedo quitar de aqui -->
         
            
        </div>

  </div>
</div>


<div class="row">
    
    <div class="col-md-12 options-list">
      <div class="col-md-6 offset-6">
          

<a class=" btn links text-black"  href="{{url('home2')}}" > <span class="glyphicon glyphicon-user"></span>HOME 2 </a>
            <a class=" btn links text-black"  href="{{url('events/event')}}" > <span class="glyphicon glyphicon-user"></span>Crear nuevo evento </a>
            <a class=" btn links text-black"  href="{{url('events/event')}}" > <span class="glyphicon glyphicon-user"></span>Loterías </a>
            <a class=" btn links text-black"  href="{{url('events/list')}}" > <span class="glyphicon glyphicon-user"></span>Eventos </a>
           @if (Route::has('login'))
                    @auth
                        <a class=" btn links" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class=" btn links" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn links" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
            </div>
        </div>
  </div>