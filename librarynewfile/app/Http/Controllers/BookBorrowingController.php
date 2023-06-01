<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookBorrowing;
use App\Models\Student;

class BookBorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $bookborrowing = new BookBorrowing;
      //  $bookborrowing->booknumber = "C34-1234";
      //  $bookborrowing->bookdescription = "Java Basics";
      //  $bookborrowing->bookcode = "B22";
      //  $bookborrowing->save();
//
      // echo "Grades data successfully saved in the database";
      
      $bookborrowingdetail = BookBorrowing:: join('student', 'bookborrowingdetail.sno', '=', 'student.sno')->get();
      return view('bookborrowingdetail.index', compact('bookborrowingdetail'));
   
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'xsno' =>['required'],
            'xbookno' => ['required', 'max:8'],
            'xbookdescription' =>['required', 'max:100'],
            'xbookcode'=>['required','max:15'],
        ]);

          
        $bookborrowingdetail = new BookBorrowing();
        $bookborrowingdetail ->sno=$request->xsno;
        $bookborrowingdetail ->bookno=$request->xbookno;
        $bookborrowingdetail ->bookdescription=$request->xbookdescription;
        $bookborrowingdetail ->bookcode=$request->xbookcode;
        $bookborrowingdetail ->save();
        return redirect()->route('bookborrowingdetail');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bookborrowingdetail = BookBorrowing::where('bbno', $id)->get();
        return view('bookborrowingdetail.show', compact('bookborrowingdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bookborrowingdetail = BookBorrowing::where('bbno', $id)->get();
        return view('bookborrowingdetail.edit', compact('bookborrowingdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookborrowingdetail = BookBorrowing::where('bbno', $id)
        ->update(
             [  'bookno' =>$request->xbookno,
                'bookdescription'=>$request->xbookdescription,
                'bookcode'=>$request->xbookcode,
             ]);
        return redirect()->route('bookborrowingdetail');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookborrowingdetail= BookBorrowing::where('bbno', $id);
        $bookborrowingdetail->delete();
        return redirect()->route('bookborrowingdetail');
    }
    public function getStudentInfo(){
        $student = Student::all();
        return view('bookborrowingdetail.add', compact('student'));
    }
}
