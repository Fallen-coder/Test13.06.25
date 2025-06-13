<x-layout>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('book.destroy', $book) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Dzēst">
    </form>

    <h2>{{ $book->title }}</h2>
    <h3>{{ $book->author }}</h3>
    <p>{{ $book->released_at }}</p>
    <a href="{{ route('book.index') }}">All books</a>
</x-layout>