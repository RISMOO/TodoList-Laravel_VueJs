<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/todo2.png') }}">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div id="app">
        <div class="container pt-0 pl-0 pr-0 mt-3 mx-auto text-center">
            <h1>
                <div class="text-center bien"id="bienvenue"style="position:absolute;top:360px; width:1150px; height:400px; z-index:2;font-size:200%">
                    <center><b>Bienvenue..</b></center>
                  </div>
                <router-link to="/tasks"><img src="{{ asset('img/list2.gif') }}" class="shadow" id="tasks"
                        width="200px" alt="todolist"></router-link><br>


                <router-link to="/home"><img src="{{ asset('img/home3.gif') }}" class="shadow" style="display: none"
                        id="home" width="200px" alt="todolist"></router-link></span>


            </h1>

            <!--VUE ROUTER-->

        </div>
        <div class="container">

            <router-view></router-view>
            <!--le contenu des composants-->
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
