<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Company;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $companies = Company::all();

        return view('products.show')->with(compact('product', 'companies'));
    }

    /**
    * Show the products list.
    *
    */
    public function index()
    {
    	$products = Product::all();

    	return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $product = new Product;
        $companies = Company::all();

        // return view('products.create')->with(compact('product', 'companies'));
        return view('products.create')->with(compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'company_id' => 'required',
        ]);
        
        $product = Product::create($request->all());

        return redirect('/products')->with('status', 'New Product added.'); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $form = $request->all();

        $product = Product::findOrFail($id);
        
        $product->update($form);

        // return redirect('/products');
        return redirect()->back()->with('status', 'Product updated.');

    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')->with('status', 'Product deleted.'); 
    }
}
