<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Games</title>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex justify-center items-center min-h-screen">
    <div class="container mx-auto p-6 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-8">Makmur TopUp</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($games as $game)
                <a href="{{ route('items.index', ['id' => $game->id]) }}" 
                   class="block p-5 bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                    <img src="{{ asset('games_images/' . $game->image_url) }}" 
                         alt="{{ $game->name }}" 
                         class="w-full h-48 object-cover rounded-md mb-3">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $game->name }}</h2>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
