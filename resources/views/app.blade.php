<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Vets</title>
    </head>
    <body>
        @yield('content')
        @include("_partials/nav")
        @include("_partials/list-owners")
        @include("_partials/footer")
    </body>
</html>