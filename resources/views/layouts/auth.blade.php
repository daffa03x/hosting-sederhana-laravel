<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Hosting Sederhana</title>

    <x-style />

</head>

<body>
    <x-alert />

    <x-preload />

    @yield('content')

    <x-footer />

    <x-script />
</body>

</html>
