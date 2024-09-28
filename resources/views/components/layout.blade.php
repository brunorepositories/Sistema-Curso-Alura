<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"></link>
</head>
<body>
    
    <header class="d-flex justify-content-center py-3 bg-dark">
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">About</a></li>
        </ul>
    </header>
    
    <div class="container mt-5">
        <h1> {{ $title }} </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>
</body>
</html>