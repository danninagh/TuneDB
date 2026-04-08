<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TuneDB')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/abcjs@6.4.4/dist/abcjs-basic-min.js"></script>
</head>
<body class="mx-auto max-w-full px-4 py-8 font-sans">
    <header class="mb-8">
        <a href='/'><h1 class="text-3xl text-red-600 font-bold">TuneDB</h1></a>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
