<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Payment;
use \App\Project;
use \App\Employee;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DB::table('payments')->get();
        $payments = DB::table('payments')->
        join('projects','projects.id','payments.project_id')->
        join('employees','employees.id','payments.employee_id')->
        select('payments.*','projects.*','employees.*')->get();
        $projects = Project::all();
        $employees = Employee::all();
        return view('admin.employees_payment',[
            'payments'=>$payments,
            'projects'=>$projects,
            'employees'=>$employees,
        ]);
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
        $this->validate($request,[
            'employee_id'=>'required',
            'project_id'=>'required',
            'payment'=>'required',
        ]);

        $payment = new Payment;
        $payment->employee_id = $request->employee_id;
        $payment->project_id = $request->project_id;
        $payment->payment = $request->payment;
        
        $payment->save();
        return redirect('/admin/payments/')->with('success','Data has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'employee_id'=>'required',
            'project_id'=>'required',
            'payment'=>'required',
        ]);

        $payment = Payment::find($id);
        $payment->employee_id = $request->employee_id;
        $payment->project_id = $request->project_id;
        $payment->payment = $request->payment;
        
        $payment->save();
        return redirect('/admin/payments/')->with('success','Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/admin/payments/')->with('success','Data has been deleted successfully');
    }
}
