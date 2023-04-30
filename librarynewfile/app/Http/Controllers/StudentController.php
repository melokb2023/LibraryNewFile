<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
  $student = Student:: all();
  return view('students.index' , compact('studentinfo'));
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
   //
$validateData =$request->validate([
   'xidNo' => ['required', 'max:8'],
   'xfirstName' =>['required', 'max:20'],
   'xmiddleName'=>['max:15'],
   'xlastName' =>['required', 'max:20'],
   'xsuffix' =>['max:5'],
   'xcourse' =>['required','max:15'],
   'xyear' =>['required'],
   'xbirthDate' =>['required','date'],
   'xgender' =>['required']
]);

$student = new Student();
$student ->idNo=$request->xidNo;
$student->firstName=$request->xfirstName;
$student ->middleName=$request->xmiddleName;
$student ->lastName=$request->xlastName;
$student ->suffix=$request->xsuffix;
$student ->course=$request->xcourse;
$student ->year=$request->xyear;
$student ->birthDate=$request->xbirthDate;
$student ->gender=$request->xgender;
$student->save();
return redirect()->route('students');

}

/**
* Display the specified resource.
*/
public function show(string $id)
{
   $student = Student::where('sno', $id)->get();
   return view('students.show', compact('studentinfo'));
}

/**
* Show the form for editing the specified resource.
*/
public function edit(string $id)
{
   //
   $student = Student::where('sno', $id)->get();
   return view('students.edit', compact('studentinfo'));
}

/**
* Update the specified resource in storage.
*/
public function update(Request $request, string $id)
{
   //
   $validateData =$request->validate([
       'xidNo' => ['required', 'max:8'],
       'xfirstName' =>['required', 'max:20'],
       'xmiddleName'=>['max:15'],
       'xlastName' =>['required', 'max:20'],
       'xsuffix' =>['max:5'],
       'xcourse' =>['required','max:15'],
       'xyear' =>['required'],
       'xbirthDate' =>['required','date'],
       'xgender' =>['required']
   ]);

   $studentinfo = Student::where('sno', $id)
   ->update(
        ['idNo' => $request->xidNo,
        'firstName'=> $request->xfirstName,
        'middleName'=> $request->xmiddleName,
        'lastName'=> $request->xlastName,
        'suffix'=> $request->xsuffix,
        'course'=> $request->xcourse,
        'year'=>$request->xyear,
        'birthDate'=> $request->xbirthDate,
        'gender'=> $request->xgender,
        ]);
   return redirect()->route('students');
}

/**
* Remove the specified resource from storage.
*/
public function destroy(string $id)
{
  $studentinfo = Student::where('sno', $id);
  $studentinfo->delete();
  return redirect()->route('students');
}
}
