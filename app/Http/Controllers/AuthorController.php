<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authorsList = Author::all();
        return view('authors/list', ['authorsList' => $authorsList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        $author->lastname = "Straub";
        $author->firstname = "Peter";
        $author->birthday = "1943-03-02";
        $author->genres = "horrory, thrillery";
        $author->save();

        $authorSecond = new Author();
        $authorSecond->lastname = "King";
        $authorSecond->firstname = "Stephen";
        $authorSecond->birthday = "1947-09-21";
        $authorSecond->genres = "horrory, thrillery";
        $authorSecond->save();

        $czarnyDom = Book::where('name', "Czarny Dom")->first();
        $czarnyDom->authors()->attach($author);
        $czarnyDom->authors()->attach($authorSecond);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
