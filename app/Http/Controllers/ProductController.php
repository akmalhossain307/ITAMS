<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    function __construct()
    {
        /*
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
         */
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::latest()->paginate(2);
        //return view('products.index',compact('products'))
           // ->with('i', (request()->input('page', 1) - 1) * 2);
            $products=Product::all();
            return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $request->validate(
            [
            'product_category' => 'required|not_in:0',
            'product_type' => 'required|not_in:0',
            'product_name' => 'required|unique:products',
            ],
            [
            'product_category.not_in' => 'Select product category!',
            'product_type.not_in' => 'Select product type!',
            'product_name.unique' => 'This product already exists!',
            ]
    );

   
    $product->product_category      =$request->product_category;
    $product->product_type          =$request->product_type;
    $product->product_name          =$request->product_name;
    $product->product_manufacturer  =$request->product_manufacturer;
    $product->product_description   =$request->product_description;
    $product->save();
    //product::create($request->all());
    return redirect()->route('products.create')->with('success','Product Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //$product=new Product();
        $product = Product::find($id);
        $request->validate(
            [
            'product_category' => 'required|not_in:0',
            'product_type' => 'required|not_in:0',
            ],
            [
            'product_category.not_in' => 'Select product category!',
            'product_type.not_in' => 'Select product type!',
            ]
            );

        $product->product_category      =$request->product_category;
        $product->product_type          =$request->product_type;
        $product->product_name          =$request->product_name;
        $product->product_manufacturer  =$request->product_manufacturer;
        $product->product_description   =$request->product_description;
        $product->save();
        //product::create($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
