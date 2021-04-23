<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Font Import -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
    />

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/front/css/bootstrap.min.css')}}"
        rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />

    <title>@yield('title',env('APP_NAME'))</title>
</head>
<body>

@yield('content')

<!-- Optional JavaScript; choose one of the two! -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

