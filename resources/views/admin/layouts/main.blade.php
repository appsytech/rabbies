<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="icon"
        href="https://www.creativefabrica.com/wp-content/uploads/2022/04/14/A-Symbol-Company-Logo-Design-Vector-Graphics-28995233-3-580x387.jpg">

    @vite('resources/css/admin/app.css')
</head>

<body class="flex min-h-screen overflow-hidden">

    <x-admin.sidebar />
    <!-- ====================== Main Content Area -with header ===================== -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden w-full">
        <x-admin.header />

        @yield('breadcrumb')

        <!--================= Main content==================-->
        <main class="flex-1 overflow-y-auto p-3 bg-gray-50">
            @yield('content')
        </main>
    </div>

    <x-admin.loader />

    @stack('scripts')
    @vite('resources/js/app.js')
    @vite('resources/js/admin/script.js')
</body>

</html>
