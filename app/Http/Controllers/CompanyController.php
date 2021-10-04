<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
   
    public function index()
    {
        $alldata=Company::all();
        return view('companies.index',compact('alldata'));
    }


    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $company=new Company();
        $request->validate(
            [
            'company_code' => 'required|unique:companies',
            'company_name' => 'required|unique:companies',
            ],
            [
            'company_code.unique' => 'This code already exists!',
            'company_name.unique' => 'This company already exists!',
            ]
    );

   
    $company->company_code      =$request->company_code;
    $company->company_name      =$request->company_name;
    $company->save();
    //product::create($request->all());
    return redirect()->route('companies.create')->with('success','Compny created successfully!');

    }

    public function edit($id)
    {
        $company=Company::find($id);
        return view('companies.edit',compact('company'));
    }


    public function update(Request $request,$id)
    {
      
        $company = Company::find($id);
      
        $company->company_code      =$request->company_code;
        $company->company_name      =$request->company_name;
        $company->save();
        //product::create($request->all());
         return redirect()->route('companies.index')->with('success','Compny updated successfully!');

    }

    
    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }


}
