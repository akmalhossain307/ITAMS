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

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$alldata=Asset::all();
        //return view('assets.index',compact('alldata'));
        
        $alldata = DB::table('assets')
        ->join('vendors', 'assets.vendor_id', '=', 'vendors.id')
        ->select('assets.*', 'vendors.name')
        ->get();
        return view('assets.index',compact('alldata'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alldata["product"]     =Product::all();
        $alldata['vendor']      =Vendor::all();
        return view('assets.create',$alldata);
    }

    public function assignAsset()
    {
       
        //$details=Asset::find($id);
        //dd($details);
        //exit;
        //return view('assets.show',compact('details'));

        $alldata["assets"]     =DB::table('assets')->where('status', '0')->get();
       // $alldata['employee']   =Employee::all();
        $alldata['employee']=DB::table('employees')
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id', '=', 'departments.id')
        ->select('employees.*', 'companies.company_name','departments.department_name')
        ->get();
        /*
        $alldata['vendor']      =Vendor::all();
        $alldata['asset']       =Asset::all();
        $alldata['location']    =Location::all();
        $alldata['company']     =Company::all();
        $alldata['department']  =Department::all();
        $alldata['employee']    =Employee::all();
        $alldata['employee']=DB::table('employees')
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->join('departments', 'employees.department_id', '=', 'departments.id')
        ->select('employees.*', 'companies.company_name','departments.department_name')
        ->get();
        */
        return view('assets.assignAsset',$alldata);
        //return view('assets.assignAsset');
    }

    public function saveAsseignAsset(Request $request)
    {
        //dd($request->all());
        //exit;
        //$asset          =new Asset();
        $assignedAsset  =new AssignedAsset();
        

        $request->validate(
            [
                'asset_id' => 'required|not_in:0',
                'employee_id' => 'required|not_in:0',
            ],
            [
                'asset_id.required'=>'Asset is required!',
                'employee_id.required'=>'Employee is required!',

                'asset_id.not_in' => 'Select an asset!',
                'employee_id.not_in' => 'Select an employee!',
              
            ]
          );

          $asset_id                     =$request->asset_id;
          $asset                        =Asset::find($asset_id);
          $asset->status                ='1'; 
          $asset->update(); 
          $assignedAsset->asset_id      =$asset_id;
          $assignedAsset->employee_id   =$request->employee_id;
          $assignedAsset->save();

          return redirect()->route('assign')->with('success','Asset Assigned Successfully!');
          
    }

    public function assignedAsset()
    {
        $assets=DB::table('assigned_assets')
        ->join('assets', 'assigned_assets.asset_id', '=', 'assets.id')
        ->join('employees', 'assigned_assets.employee_id', '=', 'employees.employee_id')
        ->select('employees.*', 'assets.asset_name','employees.emp_name')
        ->get();
        //$alldata['asset']       = Asset::find($id);
        //$alldata["employee"]    = Employee::all();

        return view('assets.assignedAssets',compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset          =new Asset();
    


        $request->validate(
            [
                //'product_category_id' => 'required|not_in:0',
                //'product_type_id' => 'required|not_in:0',
                'product_id' => 'required|not_in:0',
                'vendor_id' => 'required|not_in:0',
                'depreciation_type' => 'required|not_in:0',
                'purchase_type' => 'required|not_in:0',
                'asset_name' => 'required|max:255',
                'serial_no' => 'required|unique:assets|max:255',
            ],
            [
                'asset_name.required'=>'Asset name is required!',
                //'asset_name.unique'=>'This asset already exists, you may update quantity!',
                'serial_no.unique'=>'Serial no should be unique, this serial already in use!',
                //'product_category_id.not_in' => 'Select a product category!',
                //'product_type_id.not_in' => 'Select product type!',
                'product_id.not_in' => 'Select a product!',
                'vendor_id.not_in' => 'Select vendor!',
                'depreciation_type.not_in' => 'Select depreciation type!',
                'purchase_type.not_in' => 'Select purchase type!', 
            ]
          );
         // $asset->product_category_id   =$request->product_category_id;
          //$asset->product_type_id       =$request->product_type_id;
          $asset->product_id            =$request->product_id;
          $asset->vendor_id             =$request->vendor_id;
          $asset->depreciation_type     =$request->depreciation_type;
          $asset->purchase_type         =$request->purchase_type;
          $asset->asset_name            =$request->asset_name;
          $asset->serial_no             =$request->serial_no;
          $asset->purchase_price        =$request->purchase_price;

          $asset->purchase_date        =$request->purchase_date;
          $asset->warranty_expiry_date =$request->warranty_expiry_date;
          $asset->description          =$request->description;

          $asset->useful_life          =$request->useful_life;
          //$asset->residual_value       =$request->residual_value;
          //$asset->residual_rate        =$request->residual_rate;
          $asset->save();

         
          $assetID      = DB::table('assets')->latest('id')->first();
          
 /*
          foreach($assetID as $asset)
          {
              $ID=$asset->id;
          }

          */

          $count_spec= count($request->specification_name);
          for($i=0;$i<$count_spec;$i++)
         {
              $specification  =new Specification();
              $specification->asset_id                = $assetID->id ;

              $specification->specification_name      =$request->specification_name[$i];
              $specification->specification_value     =$request->specification_value[$i];
              $specification->save();
           
          }
          /*
          $specification->asset_id   = 3;
          $specification->specification_name   =$request->specification_name;
          $specification->specification_value  =$request->specification_value;
          $specification->save();
          */
          return redirect()->route('assets.create')->with('success','Asset Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details=Asset::find($id);
        return view('assets.show',compact('details'));


        /*
        $details['details']=Asset::find($id);
        $details['detail'] = DB::table('assets')
        ->join('vendors', 'assets.vendor_id', '=', 'vendors.id')
        ->join('specifications', 'assets.id', '=', 'specifications.asset_id')
        ->select('assets.*', 'vendors.name','specifications.specification_name','specifications.specification_value')
        ->get();

        return view('assets.show',$details);
        */

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alldata['asset'] = Asset::find($id);
        $alldata["product"]     =Product::all();
        $alldata['vendor']      =Vendor::all();
        return view('assets.edit',$alldata);
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
