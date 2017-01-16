<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Product;
use App\Treatment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
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
        $client = User::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
    * Show the clients list.
    *
    */
    public function index()
    {
        // $clients = User::all();
        //$clients = User::where('id', '!=', 1)->paginate(20);
        // $clients = User::doesntHave('roles')->paginate(5);
        $clients = User::doesntHave('roles')->get();
    	return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $client = new User;
        // return view('clients.create')->with(compact('client'));
        return view('clients.create');
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
            'number' => 'required|unique:users,number',
            'email' => 'email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);
        
        $user = User::create($request->all());

        return redirect('/clients'); 
        
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

        // if password is empty then leave it alone
        if(empty($form['password']))
        {
            array_forget($form,'password');
        }
        else
        {
            $form['password'] = bcrypt($form['password']);
        }

        if(empty($form['birthdate']))
        {
            array_forget($form,'birthdate');
        }
        if(empty($form['phone']))
        {
            array_forget($form,'phone');
        }
        if(empty($form['email']))
        {
            array_forget($form,'email');
        }
        if(empty($form['note']))
        {
            array_forget($form,'note');
        }
        if(empty($form['avatar']))
        {
            array_forget($form,'avatar');
        }

        $client = User::findOrFail($id);
        
        $client->update($form);

        // return redirect('/clients');
        return redirect()->back()->with('status', 'Profile updated!');

    }

    public function createTreatment($id)
    {
        $client = User::findOrFail($id);
        $services = Service::all();

        return view('treatments.create', compact('client', 'services'));
    }

    public function createPurchase($id)
    {
        $client = User::findOrFail($id);
        $products = Product::all();

        return view('purchases.create', compact('client', 'products'));
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request)
    {

        $client = User::findOrFail($request->client_id);
        $client->delete();

        return redirect('/clients')->with('status', 'Client deleted.'); 
    }
}