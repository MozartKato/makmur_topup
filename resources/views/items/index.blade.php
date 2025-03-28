<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }} Items</title>
</head>

<body>
    <h1>Items for {{ $game->name }}</h1>
    <a href="{{ url('/') }}">Back to Games</a>
    <form action="{{ route('order') }}" method="POST">
        @csrf
        <input type="number" name="id_player" placeholder="Player ID" required>
        <br>
        @foreach ($items as $item)
            <input type="radio" name="item_id" id="item" value="{{ $item->id }}">
            <label for="item_id">{{ $item->name }}</label>
            <label for="item_id">{{ '| Rp '. number_format($item->price, 0, ',' , '.') }}</label> <br>
        @endforeach
        <input type="text" name="name" placeholder="Masukkan Nama" required> <br>
        <input type="email" name="email" placeholder="Masukkan Email" required> <br>
        <button type="submit">Submit</button>
    </form>

</body>

</html>
