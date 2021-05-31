<!doctype html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <router-view />
    </div>
</body>

</html>