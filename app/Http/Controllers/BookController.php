<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request, Book $book) {
         $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'released_at' => 'required|date',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $path =$request->file('image')->store('image','public');

        Book::create([
            'title' =>$request->title  ,
            'author' =>$request->author  ,
            'released_at' =>$request->released_at ,
            'image'=>$path,
        ]);
         return redirect()->route('book.index')->with('status', 'Book Created successfully.');
    }

    public function show(Book $book) {
        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book) {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'released_at' => 'required|date',
        ]);

        $book->update($data);

        return redirect()->route('book.show', $book)->with('status', 'Book updated successfully.');
    }
    
    public function destroy(Book $book) {
        $book->delete();
        \Storage::disk('public')->delete($book->image);
        return redirect()->route('book.index')->with('status', 'Book deleted successfully.');
    }
}
