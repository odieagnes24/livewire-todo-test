<html>
    <head>
        <title>@yield('app-title', 'Todo List')</title>
        <link rel="stylesheet" href="/assets/bootstrap.min.css">

        @livewireStyles
    </head>
    <body>
        
        <div class="container">
            {{ $slot }} 
        </div>


        @livewireScripts
    </body>
</html>