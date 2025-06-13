<x-layout>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <h1>Books</h1>
    <a href="{{ route('book.create') }}">Create a book</a>
    <ul>
        @foreach($books as $book)
        
            <li>
                <h2>{{ $book->title }}</h2>
                <img src="{{Illuminate\Support\Facades\Storage::url($book->image)}}" alt="">
                <div>
                    <a href="{{ route('book.show', $book) }}">Show</a>
                    <a href="{{ route('book.edit', $book) }}">Edit</a>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>