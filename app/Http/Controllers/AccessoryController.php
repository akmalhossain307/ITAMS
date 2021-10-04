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
use App\Accessory;
use DB;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = DB::table('accessories')
        ->join('vendors', 'accessories.vendor_id', '=', 'vendors.id')
        ->join('companies', 'accessories.company_id', '=', 'companies.company_code')
        ->select('accessories.*', 'vendors.name', 'companies.company_name', 'companies.company_code')
        ->get();
        return view('accessories.index',compact('alldata'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alldata["company"]     =Company::all();
        $alldata['vendor']      =Vendor::all();
        return view('accessories.create',$alldata);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessory          =new Accessory();
        $request->validate(
            [
                'company_id' => 'required|not_in:0',
                'vendor_id' => 'required|not_in:0',
                'accessory_category' => 'required|not_in:0',
                'accessory_name' => 'required|max:255',
                'model_no' => 'required|unique:accessories|max:255',
            ],
            [
                'accessory_name.required'=>'Accessory name is required!',
                'accessory_category.required'=>'Accessory category is required!',
                'accessory_category.not_in'=>'Select accessory category!',
                'company_id.required'=>'Company is required!',
                'company_id.not_in'=>'Select company!',
                'vendor_id.required'=>'Vendor is required!',
                'vendor_id.not_in'=>'Select vendor!',
                'model_no.required'=>'Model no is required!',
                'model_no.unique'=>'Model no should be unique, this model no already in use!',
            ]
          );
          $accessory->company_id            =$request->company_id;
          $accessory->vendor_id             =$request->vendor_id;
          $accessory->accessory_category    =$request->accessory_category;
          $accessory->accessory_name        =$request->accessory_name;
          $accessory->model_no              =$request->model_no;

          $accessory->manufacturer          =$request->manufacturer;
          $accessory->order_no              =$request->order_no;
          $accessory->purchase_unit_price   =$request->purchase_unit_price;

          $accessory->purchase_total_price   =$request->purchase_unit_price*$request->purchase_qty;
          
          $accessory->purchase_qty          =$request->purchase_qty;
          $accessory->purchase_date         =$request->purchase_date;
          $accessory->warranty_expiry_date  =$request->warranty_expiry_date;
          $accessory->status                ='1';
          $accessory->save();

         
          //$assetID      = DB::table('assets')->latest('id')->first();
          
          return redirect()->route('accessories.create')->with('success','Accessory Added Successfully!');
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
        $alldata['accessory'] = Accessory::find($id);
        $alldata["company"]   = Company::all();
        $alldata['vendor']    = Vendor::all();
        return view('accessories.edit',$alldata);
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
        $accessory          = Accessory::find($id);
        $request->validate(
            [
                'company_id' => 'required|not_in:0',
                'vendor_id' => 'required|not_in:0',
                'accessory_category' => 'required|not_in:0',
                'accessory_name' => 'required|max:255',
                'model_no' => 'required|max:255',
            ],
            [
                'accessory_name.required'=>'Accessory name is required!',
                'accessory_category.required'=>'Accessory category is required!',
                'accessory_category.not_in'=>'Select accessory category!',
                'company_id.required'=>'Company is required!',
                'company_id.not_in'=>'Select company!',
                'vendor_id.required'=>'Vendor is required!',
                'vendor_id.not_in'=>'Select vendor!',
                'model_no.required'=>'Model no is required!',
            ]
          );
          $accessory->company_id            =$request->company_id;
          $accessory->vendor_id             =$request->vendor_id;
          $accessory->accessory_category    =$request->accessory_category;
          $accessory->accessory_name        =$request->accessory_name;
          $accessory->model_no              =$request->model_no;

          $accessory->manufacturer          =$request->manufacturer;
          $accessory->order_no              =$request->order_no;
          $accessory->purchase_unit_price   =$request->purchase_unit_price;

          $accessory->purchase_total_price   =$request->purchase_unit_price*$request->purchase_qty;
          
          $accessory->purchase_qty          =$request->purchase_qty;
          $accessory->purchase_date         =$request->purchase_date;
          $accessory->warranty_expiry_date  =$request->warranty_expiry_date;
          $accessory->status                ='1';
          $accessory->save();

         
          //$assetID      = DB::table('assets')->latest('id')->first();
          
          return redirect()->route('accessories.index')->with('success','Accessory updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accessory::find($id)->delete();
        return redirect()->route('accessories.index')
                        ->with('success','Accessory deleted successfully!');
    }
}
