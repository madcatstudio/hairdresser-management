<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Purchase;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PurchasesController extends Controller
{
    /**
    * Store a Purchase in a user found by id.
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
        if(!empty($request['date']))
        {
            $formattedDate = Carbon::createFromFormat('d/m/Y', $request['date'])->format('Y-m-d');
            $request['date'] = $formattedDate;
        }
        

        $this->validate($request, [
            'date' => 'required|date_format:"Y-m-d"',
            'products' => 'required',
        ]);

        $form = $request->all();
		$client = User::findOrFail($form['client_id']);
        
        if(empty($form['products'])) {
            array_forget($form,'products');
        } else {
            $products = $form['products'];
            $purchase = new Purchase([
                'date' => $form['date'],
                'note' => $form['note']]);
            $client->purchases()->save($purchase)->products()->sync($products);
        }

        return redirect()->route('profile', ['id' => $client->id])->with('status','Purchase successfully added!');
    }

    public function edit(Request $request)
    {
        $purchase = Purchase::findOrFail($request->purchase_id);
        $products = Product::all();

        return view('purchases.show', compact('purchase', 'products'));
    }

    public function update(Request $request)
    {
        if(!empty($request['date']))
        {
            $formattedDate = Carbon::createFromFormat('d/m/Y', $request['date'])->format('Y-m-d');
            $request['date'] = $formattedDate;
        }

        $this->validate($request, [
            'date'=> 'required|date_format:"Y-m-d"',
            'products' => 'required',
        ]);

        $form = $request->all();
        $purchase = Purchase::findOrFail($form['purchase_id']);

        if(empty($form['products'])) {
            array_forget($form,'products');
        } else {
            $products = $form['products'];
            $purchase->update([
                'date' => $form['date'],
                'note' => $form['note']]);
            $purchase->products()->sync($products);
        }

        return redirect()->route('profile', ['id' => $purchase->user->id])->with('status','Purchase updated!');
    }

    public function delete(Request $request)
    {
        $purchase = Purchase::findOrFail($request->purchase_id);
        $client = User::findOrFail($purchase->user->id);

        $purchase->delete();

        return redirect()->route('profile', ['id' => $client->id])->with('status','Purchase deleted.');
    }
}
