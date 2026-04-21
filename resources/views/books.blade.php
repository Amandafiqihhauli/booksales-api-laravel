<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h2>Genres</h2>
    <ul>
        @foreach($genres as $genre)
            <li>{{ $genre['name'] }}</li>
        @endforeach
    </ul>

    <h2>Authors</h2>
    <ul>
        @foreach($authors as $author)
            <li>{{ $author['name'] }}</li>
        @endforeach
    </ul>
</body>
</html>