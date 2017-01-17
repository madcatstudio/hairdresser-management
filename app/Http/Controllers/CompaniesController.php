<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Company;

class CompaniesController extends Controller
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

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
    * Show the companies list.
    *
    */
    public function index()
    {
    	$companies = Company::all();

    	return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $company = new Company;

        return view('companies.create')->with(compact('company'));
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
            'url' => 'url',
        ]);
        
        $company = Company::create($request->all());

        return redirect('/companies')->with('status', 'New Company added.'); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url' => 'url',
        ]);

        $form = $request->all();

        $company = Company::findOrFail($id);
        
        $company->update($form);

        // return redirect('/companies');
        return redirect()->back()->with('status', 'Company updated.');

    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {

        $company = Company::findOrFail($id);

        $company->delete();

        return redirect('/companies')->with('status', 'Company deleted.');
    }
}
