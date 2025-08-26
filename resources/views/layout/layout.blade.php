<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--Bootstrap--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Data</title>
    <style>
        img {
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
            width: 50px;
        }

        img:hover {
            transform: scale(1.2);
            /* Escala la imagen al 120% cuando se hace hover */
        }
    </style>
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>