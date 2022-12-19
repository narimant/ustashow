<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Learn;
use App\Payment;
use Illuminate\Http\Request;

class PaymentContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('user')->wherePayment(1)->latest()->paginate(20);
        return view('Admin.Payment.all' , compact('payments'));
    }

    public function unsuccessful()
    {
        $payments = Payment::with('user')->wherePayment(0)->latest()->paginate(20);
        return view('Admin.Payment.unsuccessful' , compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {

        $payment->update([
           'payment'=>1
        ]);
        Learn::create([
            'user_id'=>$payment->user_id,
            'course_id'=>$payment->course_id,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back();
    }
}
