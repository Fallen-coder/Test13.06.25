<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('book.destroy', $book) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Dzēst">
    </form>

    <h2>{{ $book->title }}</h2>
    <h3>{{ $book->author }}</h3>
    <p>{{ $book->released_at }}</p>
    <a href="{{ route('book.index') }}">All books</a>
</body>
</html>