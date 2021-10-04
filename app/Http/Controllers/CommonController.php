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

class CommonController extends Controller
{
   

  public function notifications()
  {
    return view('common.notifications');
  }

  public function settings()
  {
      $settings=DB::table('settings')->get()->first();
      return view('common.settings',compact('settings'));
  }

  public function updateSettings(Request $request)
  {

    $setting=Setting::find('1');
    if($request->hasfile('company_logo'))
    {
        $file=$request->file('company_logo');
        $extension=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;
       // $request->file('logo')->move(public_path('uploads'), $imageName);
        $request->file('company_logo')->storeAs('uploads/settings', $fileName, 'public');
        //$file->move('uploads',$fileName,"public");
        $setting->company_logo  =$fileName;
    }
    else 
    {
        //return $request;
        $setting->company_logo="";
    }

    $setting->app_name          =$request->app_name;
    $setting->company_name      =$request->company_name;
    $setting->company_email     =$request->company_email;
    $setting->contact_no        =$request->contact_no;
    $setting->address           =$request->address;
    $setting->save();
    return redirect()->route('settings')->with('success','Settings updated successfully!');
     
  }
  

  public function faqs()
  {
    return view('common.faqs');
  }

  public function user_guide()
  {
    return view('common.user_guide');
  }
 

}
