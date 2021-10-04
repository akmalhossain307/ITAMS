<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Specification;
use App\Product;
use App\Vendor;
use App\Location;
use App\Department;
use App\Company;
use App\Employee;
use App\AssignedAsset;
use DB;

class assetAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function saveAsseignAsset(Request $request)
    {
       // dd($request->all());
       // exit;
        //$asset          =new Asset();
        $assignedAsset  =new AssignedAsset();
        

        $request->validate(
            [
                'employee_id' => 'required|not_in:0',
            ],
            [
                'employee_id.required'=>'Employee is required!',
                'employee_id.not_in' => 'Select an employee!',
              
            ]
          );


          $assignedAsset->product_category  =$request->product_category;
          $assignedAsset->product_type      =$request->product_type;
          $assignedAsset->product_name      =$request->product_name;
          $assignedAsset->vendor_name       =$request->vendor_name;
          $assignedAsset->asset_id          =$request->asset_id;
          $assignedAsset->employee_id       =$request->employee_id;
          $assignedAsset->description       =$request->description;
          $assignedAsset->save();

          return redirect()->route('assignasset')->with('success','Asset Assigned Successfully!');
          
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $alldata['asset']       = Asset::find($id);
        //$alldata["employee"]    = Employee::all();
        $alldata['employee']=DB::table('employees')
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id', '=', 'departments.id')
        ->select('employees.*', 'companies.company_name','departments.department_name')
        ->get();

        return view('assets.assignAssetSpecific',$alldata);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
