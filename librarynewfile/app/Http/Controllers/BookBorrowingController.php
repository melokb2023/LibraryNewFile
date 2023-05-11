<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookBorrowing;

class BookBorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookborrowing = new BookBorrowing;
        $bookborrowing->booknumber = "C34-1234";
        $bookborrowing->bookdescription = "Java Basics";
        $bookborrowing->bookcode = "B22";
        $bookborrowing->save();

       echo "Grades data successfully saved in the database";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'xbookno' => ['required', 'max:8'],
            'xbookdescription' =>['required', 'max:100'],
            'xbookcode'=>['required','max:15'],
        ]);
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
