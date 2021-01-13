<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index');
    }

    public function books()
    {
        return Book::orderBy('name')->get();
    }

    public function store(Request $request)
    {
        Book::create([
            'name' => $request->name,
            'author' => $request->author
        ]);
    }    

    public function destroy($bookId)
    {
        Book::whereId($bookId)->delete();
    }
}
