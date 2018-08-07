<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\product;
use Validator;
use Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $rules =
     [
     'name' => 'required',
     'brandID' => 'required',
     ];

     protected $rules2 =
     [
       'name' =>'required',
       'id' => 'required|unique:products,PK_ProductID',
     ];
    public function index()
    {
        //
        $products = product::all();
        return view('navigation/brand/products', ['products' => $products]);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if($validator->fails()){
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
        $products = new product();
        $products->Product_Name = $request->name;
        $products->FK_GuestBrandID = $request->brandID;
        $products->save();
        return response()->json($products);
      }
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
        $validator = Validator::make(Input::all(), $this->rules2);
        if($validator->fails()){
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
        $products = product::find($id);
        $products->Product_Name = $request->name;
        $products->save();
        return response()->json($products);
        }
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
        $products = product::findorfail($id);
        $products->delete();

        return response()->json($products);
    }
}
