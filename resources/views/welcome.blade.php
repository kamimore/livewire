<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- @livewireStyles --}}
    <livewire:styles />
</head>

<body>
    {{-- @livewire('comments') --}}
    {{-- @livewireScripts --}}
    <div class="d-flex align-items-stretch justify-content-around mx-2 mx-lg-5 mt-4 mt-lg-4 flex-column flex-lg-row">
        <div class="col col-lg-4 card card-body mx-0 mx-lg-4 mb-4 mb-lg-0">
            <livewire:tickets />
        </div>
        <div class="col col-lg-8 card card-body">
            <livewire:comments />
        </div>

    </div>
    <livewire:scripts />
</body>

</html>
