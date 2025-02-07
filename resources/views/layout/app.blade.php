<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Interview Questions - Softedge System</title>

        <!-- Fonts --> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap.css">
        @vite(['resources/css/app.css'])
    </head>
    <body> 
        <div>
            @yield('content')
        </div> 
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
        <script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.js"></script>
        <script src="https://cdn.datatables.net/select/3.0.0/js/select.bootstrap.js"></script>
        @stack('scripts')
    </body>
</html>
