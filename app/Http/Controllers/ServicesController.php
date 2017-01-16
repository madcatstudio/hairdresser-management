<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function __constructor()
    {
    	$this->middlewear('auth');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    public function index()
    {
    	$services = Service::all();
    	return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $service = new Service;
        // return view('services.create')->with(compact('service'));
        return view('services.create');
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
        ]);
        
        $service = Service::create($request->all());

        // return redirect('/services');
        return redirect('/services')->with('status', 'New Service added.');
        
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

        $service = Service::findOrFail($id);
        
        $service->update($form);

        // return redirect('/services');
        return redirect()->back()->with('status', 'Service updated.');

    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('/services')->with('status', 'Service deleted.');
    }
}
