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
use App\Setting;

use DB;

class ReportController extends Controller
{
    public function print_vendor_list()
    {
        $alldata=Vendor::all();
        return view('reports.vendor_report',compact('alldata'));
        
    }

    public function asset_report()
    {
        return view('reports.asset_report');
        
    }

    public function view_asset_report(Request $request)
    {
        $fdate=$request->from_date;
        $tdate=$request->to_date;
        $assets=DB::table('assets')
                        ->whereBetween('purchase_date', [$fdate, $tdate])
                    //    ->where('status',1)
                        //->join('vendors', 'assets.vendor_id', '=', 'vendors.id')
                       // ->select('assets.*', 'vendors.vendor_name')
                        ->get();
     return view('reports.view_asset_report',compact('assets'));  
    }

    public function asset_cost_report()
    {
        return view('reports.asset_cost_report');
        
    }

    
    
    public function view_asset_cost_report(Request $request)
    {
        $fdate=$request->from_date;
        $tdate=$request->to_date;
        $assets=DB::table('assets')
                        ->whereBetween('purchase_date', [$fdate, $tdate])
                    //    ->where('status',1)
                        //->join('vendors', 'assets.vendor_id', '=', 'vendors.id')
                       // ->select('assets.*', 'vendors.vendor_name')
                        ->get();
     return view('reports.view_asset_costing_report',compact('assets'));  
    }

}
