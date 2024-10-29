<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Isbn;
use DB;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Book $book)
    {
        $booksList = $book->all();
        return view('books/list', ['booksList' => $booksList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $book = new Book();
        // $book->name = "Pan Tadeusz";
        // $book->year = 1999;
        // $book->publication_place = "Kraków";
        // $book->pages = 450;
        // $book->price = 39.99;
        // $book->save();
        // $isbn = new Isbn(['number' => '123456789', 'issued_by' => "Wydawca", 'issued_on' => "2015-01-20"]);
        // $book->isbn()->save($isbn);
        // return redirect('books');
        $book = new Book();
        $book->name = "Czarny Dom";
        $book->year = 2010;
        $book->publication_place = "Warszawa";
        $book->pages = 648;
        $book->price = 59.99;
        $book->save();
        return redirect('books');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books/show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $book->name = "Quo Vadis";
        $book->year = 2001;
        $book->publication_place = "Warszawa";
        $book->pages = 650;
        $book->price = 59.99;
        $book->save();

        return redirect('books');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('books');
    }
    public function cheapest(Book $book)
    {
        $booksList = DB::table('books')->orderBy('price', 'asc')->limit(3)->get();
        return view('books/list', ['booksList' => $booksList]);
    }
    public function longest(Book $book)
    {
        $booksList = DB::table('books')->orderBy('pages', 'desc')->limit(3)->get();
        return view('books/list', ['booksList' => $booksList]);
    }

    public function search(Request $request, Book $book)
    {
        $q = $request->input('q', "");
        $booksList = DB::table('books')->where('name', 'like', "%" . $q . "%")->get();
        return view('books/list', ['booksList' => $booksList]);
    }
}
