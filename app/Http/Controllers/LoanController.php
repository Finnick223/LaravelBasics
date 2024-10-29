<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Loan $loan)
    {
        $loansList = Loan::all();
        return view('loans/list', ['loansList' => $loansList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobbit = Book::where('name', "Hobbit")->first();

        $loan = new Loan();
        $loan->client = "Tadeusz Jakacki, Jaworowa 13, 00-900 Warszawa, 600 111 222";
        $loan->loaned_on = "2019-04-10";
        $loan->estimated_on = "2019-04-24";
        $hobbit->loans()->save($loan);
        $loan->save();
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
