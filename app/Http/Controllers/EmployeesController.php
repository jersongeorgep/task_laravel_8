<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['employees'] = Employees::get();
        return view('employees.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
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
        $employees = new Employees();
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->mobile_no = $request->mobile_no;
        $employees->department = $request->department;
        $employees->status = $request->status;
        $employees->save();
        return redirect()->route('employees')->with('success', "Data saved successfully");
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
        $data['employee'] = Employees::find($id);
        return view('employees.edit',  $data);
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
        //
        $employees = Employees::find($id);
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->mobile_no = $request->mobile_no;
        $employees->department = $request->department;
        $employees->status = $request->status;
        $employees->update();
        return redirect()->route('employees')->with('success', "Data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employees::find($id);
        $data->delete();
        return redirect()->route('employees')->with('success', "Data deleted successfully");
    }
}
