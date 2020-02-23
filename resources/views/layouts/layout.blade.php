 <!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>@yield('title')</title>
    <!-- Icons-->  
    <!-- Jquery -->
<script src="{{asset('js/jquery.min.js')}}"></script> 

<script type="text/javascript" src="{{asset('vue/vue.js')}}"></script> 
<script type="text/javascript" src="{{asset('vue/vue-resource.js')}}"></script> 
<script src="{{asset('bootstrap4.1-dist/js/bootstrap.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('js/ajaxCrud.js')}}"></script>  -->
    <!-- Frames JS -->
<!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script> -->
<!--      <script src="{{asset('bootstrap4.1-dist/js/bootstrap.min.js')}}"></script> -->
   
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
  
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/l ibs/jquery/3.3.1/jquery.min.js"></script> -->


    <!-- css -->
    <!-- <link href="{{asset('css/estilos.css')}}" rel="stylesheet"> -->
    <!-- Fonts -->
     <script src="{{asset('bootstrap4.1-dist/fonts')}}"></script>
       <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css"> -->
    <!-- Frames css -->
  <!--   <link href="{{asset('/bootstrap4.1-dist/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->

<!-- cabeceras -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  @include('includes.navbar')
  <body>
      <div class="row">
          <div class="col-md-11 offset-1">
              <div class="p-4">
                @yield('content')
              </div>
          </div>
      </div>
   </body>
   @include('includes.footer')