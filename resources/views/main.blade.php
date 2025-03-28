<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
</head>
<body>
    <ul>
        @foreach ($games as $game)
            <li>
                <a href="{{ route('items.index', ['id' => $game->id]) }}">
                    {{ $game->name }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
