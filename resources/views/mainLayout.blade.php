<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <style>
        * {
            font-family: calibri;
            font-size: 1.5rem;
        }

        .auth-labels {
              display:inline-block;
              width: 8em;
        }

        .auth-textbox {
            /* display: inline-block; */
            margin-bottom: .5em;
        }

        .auth-checkbox {
            line-height: 1em;
            height: 1em;
            width: 1em;
        }
    </style>
</head>
<body>
    @if(!Auth::check())
       @yield('auth-content')
    @else
       @yield('page-content')
    @endif
</body>
</html>
