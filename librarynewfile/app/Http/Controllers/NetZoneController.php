<?php

namespace App\Http\Controllers;
use App\Models\NetZone;
use App\Models\Student;

use Illuminate\Http\Request;

class NetZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $netzone = new NetZone;
       // $netzone->sno = 1;
       // $netzone->purpose = "Documentation";
       // $netzone->sittingnumber = 14;
       // $netzone->save();
//
       //echo "Grades data successfully saved in the database";

    $netzone = NetZone:: join('student', 'netzone.sno', '=', 'student.sno')->get();
    return view('netzone.index', compact('netzone'));
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
            'xpurpose' =>['required', 'max:15'],
            'xsittingnumber'=>['max:15'],
        ]);
        
        $netzone = new NetZone();
        $netzone ->sno=$request->xsno;
        $netzone ->purpose=$request->xpurpose;
        $netzone ->sittingnumber=$request->xsittingnumber;
        $netzone ->save();
        return redirect()->route('netzone');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $netzone = NetZone::where('nno', $id)->get();
        return view('netzone.show', compact('netzone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $netzone = NetZone::where('nno', $id)->get();
        return view('netzone.edit', compact('netzone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xsno' => ['required'],
            'xpurpose' =>['required', 'max:15'],
            'xsittingnumber'=>['max:15'],
        ]);
        
        $netzone = NetZone::where('nno', $id)
        ->update(
             ['sno' => $request->xsno,
             'purpose'=> $request->xpurpose,
             'sittingnumber'=> $request->xsittingnumber,
             ]);
        return redirect()->route('netzone');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $netzone= NetZone::where('nno', $id);
        $netzone->delete();
        return redirect()->route('netzone');
    }
    public function getStudentInfo(){
        $student = Student::all();
        return view('netzone.add', compact('student'));
    }

}
