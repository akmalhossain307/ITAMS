<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        
            $data['vendors']            = DB::table('vendors')->count();
            $data['assets']             = DB::table('assets')->count();
            $data['totalAssetCost']     = DB::table('assets')->sum('purchase_price');
            $data['assignedAssets']     =DB::table('assets')->where('status', 1)->count();
            $data['unAssignedAssets']   =DB::table('assets')->where('status', 0)->count();
            $data['locations']          = DB::table('locations')->count();
            $data['companies']          = DB::table('companies')->count();
            $data['departments']        = DB::table('departments')->count();

            $data['accessories']        = DB::table('accessories')->count();
            $data['totalAccessoryCost']     = DB::table('accessories')->sum('purchase_total_price');


            $data['products']       = DB::table('products')->count();
            $data['employees']      = DB::table('employees')->count();
            return view('dashboard',$data);
     




       //return view('dashboard');
        //return "Hello";
        //Role::create(['name'=>'writer']);
        //Permission::create(['name'=>'edit post']);

       //$role=Role::findById(1);
       //$permission=Permission::findById(1);
      // $role=Role::findById(1);
       //$permission = Permission::create(['name' => 'edit post']);
       //$permission = Permission::create(['name' => 'edit post']);
       //$permission=Permission::findById(3);
       //$role=Role::findById(1);
       //$role->givePermissionTo($permission);
       //$permission->assignRole($role);
      // auth()->user()->givePermissionTo('edit post');
       //auth()->user()->assignRole('writer');


       //return auth()->user()->getPermissionNames();
        //return view('home');
    }
}
