<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Department;
use App\Location;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$alldata=Employee::all();
        //return view('employees.index',compact('alldata'));
        $alldata = DB::table('employees')
            ->join('companies', 'employees.company_id', '=', 'companies.id')
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->join('locations', 'employees.location_id', '=', 'locations.id')
            ->select('employees.*', 'companies.company_name','departments.department_name', 'locations.location')
            ->get();
            return view('employees.index',compact('alldata'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alldata["company"]     =Company::all();
        $alldata['department']  =Department::all();
        $alldata['location']    =Location::all();
        return view('employees.create',$alldata);
        //return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee=new Employee();
        $request->validate(
            [
                'employee_id' => 'required|unique:employees|max:100',
                'emp_name' => 'required|max:255',
                'company_id' => 'required|not_in:0',
                'department_id' => 'required|not_in:0',
                'location_id' => 'required|not_in:0',
            ],
            [
                'emp_name.required'=>'Employee name is required!',
                'company_id.not_in' => 'Select a company!',
                'department_id.not_in' => 'Select a department!',
                'location_id.not_in' => 'Select a location!',
                'employee_id.unique' => 'This employee ID already exists!',
                
            ]
          );
        $employee->employee_id          =$request->employee_id;
        $employee->emp_name             =$request->emp_name;
        $employee->emp_email            =$request->emp_email;
        $employee->emp_phone            =$request->emp_phone;
        $employee->company_id           =$request->company_id;
        $employee->department_id        =$request->department_id;
        $employee->location_id          =$request->location_id;
        $employee->save();
        //Vendor::create($request->all());
        return redirect()->route('employees.create')->with('success','Employee Added Successfully!');
    
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
        $alldata['employee'] = Employee::find($id);
        $alldata["company"]     =Company::all();
        $alldata['department']  =Department::all();
        $alldata['location']    =Location::all();
        return view('employees.edit',$alldata);
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
        $employee= Employee::find($id);
        $employee->emp_name             =$request->emp_name;
        $employee->emp_email            =$request->emp_email;
        $employee->emp_phone            =$request->emp_phone;
        $employee->company_id           =$request->company_id;
        $employee->department_id        =$request->department_id;
        $employee->location_id          =$request->location_id;
        $employee->save();
        //Vendor::create($request->all());
        return redirect()->route('employees.index')->with('success','Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
}
