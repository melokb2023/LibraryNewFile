<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Student;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $payment  = new Payment;
       // $payment ->sno = 1;
       // $payment ->payment = 2.45;
       // $payment ->paymentMethod = "Cash On Delivery";
       // $payment ->reasons = "Crumpled Pages";
       // $payment ->remarks = "Paid";
       // $payment ->save();

       //echo "Grades data successfully saved in the database";
       $payment = Payment:: join('student', 'payment.sno', '=', 'student.sno')->get();
       return view('payment.index', compact('payment'));
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
       
        $payment = new Payment();
        $payment ->sno=$request->xsno;
        $payment ->payment=$request->xpayment;
        $payment ->paymentmethod=$request->xpaymentmethod;
        $payment ->reasons=$request->xreasons;
        $payment ->remarks=$request->xremarks;
        $payment ->save();
        return redirect()->route('payment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::where('paymentno', $id)->get();
        return view('payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::where('paymentno', $id)->get();
        return view('payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::where('paymentno', $id)
        ->update(
             [  
                'payment' =>$request->xpayment,
                'paymentmethod'=>$request->xpaymentmethod,
                'reasons'=>$request->xreasons,
                'remarks'=>$request->xremarks,
             ]);
        return redirect()->route('payment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment= Payment::where('paymentno', $id);
        $payment->delete();
        return redirect()->route('payment');
    }
    public function getStudentInfo(){
        $student = Student::all();
        return view('payment.add', compact('student'));
    }
}
