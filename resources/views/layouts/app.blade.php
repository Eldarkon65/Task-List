<!DOCTYPE html>
<html lang="en">
<head>
    <title> Laravel Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-log">
    <h1 class="text-2xl mb-4">@yield('title')</h1>

    <div>
        @if (session()->has('success'))
        <div>{{ session('success') }}</div>
        @endif
        @yield ('content')
    </div>
</body>
</html>