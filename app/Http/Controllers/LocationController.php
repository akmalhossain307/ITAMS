<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
        $alldata=Location::all();
        return view('locations.index',compact('alldata'));
    }


    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $location=new Location();
        $request->validate(
            [
            'location' => 'required|unique:locations',
            ],
            [
            'location.unique' => 'This location already exists!',
            ]
    );

   
    $location->location      =$request->location;
    $location->details      =$request->details;
    $location->save();
    //product::create($request->all());
    return redirect()->route('locations.create')->with('success','Location created successfully!');

    }

    public function edit($id)
    {
        $location=Location::find($id);
        return view('locations.edit',compact('location'));
    }


    public function update(Request $request,$id)
    {
      
        $location = Location::find($id);
      
        $location->location     =$request->location;
        $location->details      =$request->details;
        $location->save();
        //product::create($request->all());
        return redirect()->route('locations.index')->with('success','Location updated successfully!');

    }

    
    public function destroy(Location $location)
    {
        $location->delete();


        return redirect()->route('locations.index')
                        ->with('success','Location deleted successfully');
    }




}
