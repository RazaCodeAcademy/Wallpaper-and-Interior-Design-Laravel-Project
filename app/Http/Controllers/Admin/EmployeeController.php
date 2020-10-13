<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Employee;
use Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = Employee::all();
        // return view('Employees.index',[
        //     'employees'=>$employees
        // ]);
        $employees=Employee::all();
        return view('admin.employees',[
            'employees'=>$employees
        ]);
        // ->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.create');
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
            'first_name'=>'required',
            'last_name'=>'required',
            'contact'=>'required',
            'cnic'=>'required',
            'address'=>'required',
            'image'=>'required',
        ]);
        $employee= new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->contact = $request->contact;
        $employee->cnic = $request->cnic;
        $employee->address = $request->address;
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time(). '.' .$extension;
            $file->move('uploads/Employees/',$filename);
            $employee->image = $filename;
        } else {
            return $request;
            $employee->image = '';
        }

        $employee->save();
        return redirect('/admin/employees')->with('success','Data has been saved successfully');
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
            'first_name'=>'required',
            'last_name'=>'required',
            'contact'=>'required',
            'cnic'=>'required',
            'address'=>'required',
        ]);
        $emps= Employee::find($id);
        $emps->first_name=$request->first_name;
        $emps->last_name=$request->last_name;
        $emps->contact=$request->contact;
        $emps->cnic=$request->cnic;
        $emps->address=$request->address;

        $emps->save();
        return redirect('/admin/employees')->with('success','Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emps=Employee::find($id);
        $emps->delete();
        return redirect('/admin/employees')->with('success','Data has been deleted successfully');
    }

    public function employee(){
        $employee = Employee::get()->count('id');
        return view('admin-index',[
            'employee'=>$employee
        ]);
    }
}
