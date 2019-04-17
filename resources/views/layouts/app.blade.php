<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    @auth
    
                        <button type="button" id="menu-toggle" class="btn" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    @endauth
                    
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div id="wrapper" @guest class="fliph" @endguest >
            <div class="sidebar sticky-left">
                @auth
                    <aside>
                        <ul class="list-sidebar bg-default">
                            @include('layouts.menu')
                        </ul>
                    </aside>
                @endauth
            </div>
            <div id="page-content" class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}"></script>
    

    <script type="text/javascript">
        
        $(document).ready(function(){
            /*Menu-toggle*/
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("fliph");
            });
        });

        function getSelectOptions(route, element, target, indexElement){
            var results = '#flash-msg';
            var token = $('input[name="_token"]').val();
            var elem_val = $(element).val();
            var data = {id :elem_val, _token : token};
            var eqElement = '';
            if (indexElement !== undefined) {
                eqElement = ':eq('+indexElement+')';
            }
            if (route != '' && elem_val != '') {

                $.ajax({
                    url:route,
                    data: data,
                    type:'POST',
                    headers: {'X-CSRF-TOKEN': token},
                    // processData: false,
                    // contentType: false,
                    success:function(response){
                        $('select[name="'+ target +'"]'+eqElement+' option:not([value=""])').remove();
                        $.each(response, function(i,item) {
                            $('select[name="'+ target +'"]'+eqElement+'').append("<option value=\""+ i +"\">" + item + "</option>");
                        });
                        $('select[name="'+ target +'"]'+eqElement+'').focus();
                        // if (target.indexOf('layout') != -1) {
                            // para el caso de ser otro select del que se cargue un tercero
                            $('select[name="'+ target +'"]'+eqElement+'').change();
                        // }
                    },
                    error:function(msj){
                        console.log(msj);
                        $( results ).attr('return','error');
                    }
                });
            }else{
                $('select[name="'+ target +'"]'+eqElement+' option:not([value=""])').remove();
                // if (target.indexOf('layout') != -1) {
                    // para el caso de ser otro select del que se cargue un tercero
                    $('select[name="'+ target +'"]'+eqElement+'').change();
                // }
            }
        }

        
        $(document).ready(function() {
            // clona el layout de los productos, le cambia los nombres y lo agrega al final de la lista
            $('#addRegister').click(function(){
                var products = $('.layout.products').clone();

                products.find('[name="products_layout"]').attr('name','products[]').attr('required','required');
                products.find('[name="quantities_layout"]').attr('name','quantities[]').attr('required','required');

                products.removeClass('layout');
                products.removeClass('hide');

                $('.list-products').append(products);
                    
            });     
            // elimina el ultimo producto de la lista 
            $('.delRegister').click(function(){
                $(this).parents('.products').remove();
            });
            
        });
    
    </script>
    
    @yield('functions')

</body>
</html>
