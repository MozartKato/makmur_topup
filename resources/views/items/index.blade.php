<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }} Items</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Items for {{ $game->name }}</h1>
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline block text-center mb-4">&larr; Back to Games</a>
        
        <form action="{{ route('order') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-gray-700">Player ID</label>
                <input type="number" name="id_player" placeholder="Player ID" required 
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            
            <fieldset class="border border-gray-300 p-4 rounded-md">
                <legend class="text-gray-700 font-semibold">Select Item</legend>
                @foreach ($items as $item)
                    <div class="flex items-center space-x-2">
                        <input type="radio" name="item_id" id="item_{{ $item->id }}" value="{{ $item->id }}" class="form-radio text-blue-500">
                        <label for="item_{{ $item->id }}" class="text-gray-700">{{ $item->name }} | Rp {{ number_format($item->price, 0, ',' , '.') }}</label>
                    </div>
                @endforeach
            </fieldset>
            
            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" placeholder="Masukkan Nama" required 
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" required 
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Buat Order</button>
        </form>
    </div>
</body>

</html>
