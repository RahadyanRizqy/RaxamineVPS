<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/jquery.terminal@2.x.x/js/jquery.terminal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jcubic/static/js/wcwidth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.terminal/js/jquery.terminal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-polyfills/keyboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.terminal/js/unix_formatting.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.8.1/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.terminal/js/less.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.terminal/js/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/figlet/lib/figlet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/72de65cb10.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/jquery.terminal@2.x.x/css/jquery.terminal.min.css"/>
    @stack('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: Poppins;
        }
    </style>
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/icon/logo.ico')}}">
</head>
    @yield('content')
</html>