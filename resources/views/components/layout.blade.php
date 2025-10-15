<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body>
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    @isset($header)
        <h2>{{$header}}</h2>
    @endisset
    <!-- page content -->

    <main class="text-black">
        {{$slot}}
    </main>

</div>
<footer>

</footer>
</body>
</html>
