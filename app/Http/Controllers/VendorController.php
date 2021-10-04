<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $alldata=Vendor::all();
        return view('vendors.index',compact('alldata'));
      
    }

    public function create()
    {
       // dd("Vendor create works!");
        return view('vendors.create');
    }

    public function store(Request $request)
    {

        $vendor=new Vendor();
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|unique:vendors|max:255',
                'contact_person' => 'required|max:255',
                'phone_no' => 'required|between:6,20,',
                'logo' => 'mimes:jpeg,png,jpg,gif|max:2014',
            ],
            [
                'name.required'=>'Vendor name is required!',
                'email.required'=>'Vendor email is required!',
                'email.unique'=>'Vendor email should be unique!',
                'contact_person.required'=>'Please enter vendor contact person!',
                'phone_no.required'=>'Phone no. of contact person is required!',
                'phone_no.unique' => 'This phone no. is already taken!'
            ]
          );

            if($request->hasfile('logo'))
            {
                $file=$request->file('logo');
                $extension=$file->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
               // $request->file('logo')->move(public_path('uploads'), $imageName);
                $request->file('logo')->storeAs('uploads', $fileName, 'public');
                //$file->move('uploads',$fileName,"public");
                $vendor->logo  =$fileName;
            }
            else 
            {
                //return $request;
                $vendor->logo  ="";
            }


/*
          if ($request->file('logo')) {
            $imagePath = $request->file('logo');
            $imageName = time().'-'.$imagePath->getClientOriginalName();
  
            //$path = $request->file('logo')->storeAs('uploads', $imageName, 'public');
            //$path=$request->file('logo')->move(public_path('uploads'), $imageName);
          }
          
       */   
        $vendor->name               =$request->name;
        //$vendor->logo               =$path;
        $vendor->email              =$request->email;
        $vendor->contact_person     =$request->contact_person;
        $vendor->phone_no           =$request->phone_no;
        $vendor->designation        =$request->designation;
        $vendor->address            =$request->address;
        $vendor->details            =$request->details;

        $vendor->save();
        //Vendor::create($request->all());
        return redirect()->route('vendors.create')->with('success','Vendor Added Successfully!');
    }


    public function show($id)
    {
        $details=Vendor::find($id);
        return view('vendors.show',compact('details'));

    }

    public function edit($id)
    {
        $editData=Vendor::find($id);
        return view('vendors.edit',compact('editData'));

    }



    public function update(Request $request,$id)
    {

        $vendor=Vendor::find($id);

        //$vendor=new Vendor();
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'contact_person' => 'required|max:255',
                'phone_no' => 'required|between:6,20,',
                'logo' => 'mimes:jpeg,png,jpg,gif|max:2014',
            ],
            [
                'name.required'=>'Vendor name is required!',
                'email.required'=>'Vendor email is required!',
         
                'contact_person.required'=>'Please enter vendor contact person!',
                'phone_no.required'=>'Phone no. of contact person is required!',
                
            ]
          );

            if($request->hasfile('logo'))
            {
                $file=$request->file('logo');
                $extension=$file->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
               // $request->file('logo')->move(public_path('uploads'), $imageName);
                $request->file('logo')->storeAs('uploads', $fileName, 'public');
                //$file->move('uploads',$fileName,"public");
                $vendor->logo  =$fileName;
            }
           

        $vendor->name               =$request->name;
        //$vendor->logo               =$path;
        $vendor->email              =$request->email;
        $vendor->contact_person     =$request->contact_person;
        $vendor->phone_no           =$request->phone_no;
        $vendor->designation        =$request->designation;
        $vendor->address            =$request->address;
        $vendor->details            =$request->details;

        $vendor->save();
        //Vendor::create($request->all());
        return redirect()->route('vendors.index')->with('success','Vendor updated successfully!');
    }



    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return redirect()->route('vendors.index')
                        ->with('success','Vendor deleted successfully');
    }



}
