
    <link href="{{asset('/bootstrap4.1-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap4.1-dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 <script src="{{asset('bootstrap4.1-dist/fonts')}}"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
<div class="container-fluid p-2">
<nav class="navbar-expand-md navbar-blue">
      
  <div class="row">
        
        <div class="col-md-3 ">
          
        
         <h3 class="navbar-link">
           <a href="{{url('/')}}" class="text-black">Tu agencia Online</a>
         </h3>
         <!-- Esto esta aqui porque el login no me sirve, pero estos links tambien estan e home.blade.php, asi que cuando arregle esas vistas, los puedo quitar de aqui -->
         <a class="navbar-brand links text-black"  href="{{route('numberlist')}}" ><b><h4> Listado de numeros </h4></b></a>

            <a class="navbar-brand links text-black"  href="{{url('sorteo')}}" ><b><h4> <span class="glyphicon glyphicon-user"></span>Crear nuevo evento </h4></b></a>
            
        </div>
        <div class="col-md-3 offset-5">
           @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
  </div>
  </nav></div>