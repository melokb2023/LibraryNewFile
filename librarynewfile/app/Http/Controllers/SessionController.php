<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Student;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $session = new Session;
      //  $session->sno = 1;
      //  $session->studentpurpose = "Self-Study";
      //  $session->studentsession = "Vacant Time";
      //  $session->save();
//
      // echo "Grades data successfully saved in the database";

    $librarysession = Session:: join('student', 'librarysession.sno', '=', 'student.sno')->get();
    return view('librarysession.index', compact('librarysession'));
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
            'xsno' => ['required'],
            'xstudentpurpose' =>['required', 'max:15'],
            'xstudentsession'=>['max:15'],
        ]);
        
        $librarysession = new Session();
        $librarysession ->sno=$request->xsno;
        $librarysession ->studentpurpose=$request->xstudentpurpose;
        $librarysession ->studentsession=$request->xstudentsession;
        $librarysession ->save();
        return redirect()->route('librarysession');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $librarysession = Session::where('librarysessionno', $id)->get();
        return view('librarysession.show', compact('librarysession'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $librarysession = Session::where('librarysessionno', $id)->get();
        return view('librarysession.show', compact('librarysession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $librarysession = Session::where('librarysessionno', $id)
        ->update(
             ['sno' => $request->xsno,
             'studentpurpose'=> $request->xstudentpurpose,
             'studentsession'=> $request->xstudentsession,
             ]);
        return redirect()->route('librarysession');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $librarysession= Session::where('librarysessionno', $id);
        $librarysession->delete();
        return redirect()->route('librarysession');
    }
    public function getStudentInfo(){
        $student = Student::all();
        return view('librarysession.add', compact('student'));
    }
}
