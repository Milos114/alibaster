<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exchange office</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            margin-top: 50px;
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>
<body class="">
<div class="container">
    <div>
        <livewire:exchange-component />
    </div>
    <div class="mt-5">
        <livewire:orders-component />
    </div>
</div>
@include('sweetalert::alert')

@livewireScripts
</body>
</html>
