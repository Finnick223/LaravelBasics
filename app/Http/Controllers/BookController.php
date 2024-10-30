<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Repositories\BookRepository;
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
    public function create(BookRepository $bookRepo)
    {
        \App::setLocale(session('locale'));
        $authors = Author::all();
        return view('books/create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook $request, BookRepository $bookRepo)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'year' => 'required|integer',
            'publication_place' => 'required|string',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $data = $request->all();
        $bookRepo->create($data);
        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRepository $bookRepo, $id)
    {
        $book = $bookRepo->find($id);
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
    public function destroy(BookRepository $bookRepo, $id)
    {
        $bookRepo->delete($id);
        return redirect('books');
    }
    public function cheapest(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->cheapest();
        return view('books/list', ['booksList' => $booksList]);
    }
    public function longest(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->longest();
        return view('books/list', ['booksList' => $booksList]);
    }
    public function search(Request $request, BookRepository $bookRepo)
    {
        $q = $request->input('q', "");
        $booksList = $bookRepo->search($q);
        return view('books/list', ['booksList' => $booksList]);
    }
}
