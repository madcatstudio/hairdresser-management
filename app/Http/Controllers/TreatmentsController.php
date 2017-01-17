<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Treatment;
use App\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class TreatmentsController extends Controller
{
    /**
    * Store a Treatment in a user found by id.
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
            'date'=> 'required|date_format:"Y-m-d"',
            'services' => 'required',
        ]);

        $form = $request->all();
		$client = User::findOrFail($form['client_id']);
        
        if(empty($form['services'])) {
            array_forget($form,'services');
        } else {
            $services = $form['services'];
            $treatment = new Treatment([
                'date' => $form['date'],
                'note' => $form['note']]);
            $client->treatments()->save($treatment)->services()->sync($services);
        }
        
        return redirect()->route('profile', ['id' => $client->id])->with('status','Treatment added.');
    }

    public function edit(Request $request)
    {
        $treatment = Treatment::findOrFail($request->treatment_id);
        $services = Service::all();

        return view('treatments.show', compact('treatment', 'services'));
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
            'services' => 'required',
        ]);

        $form = $request->all();
        $treatment = Treatment::findOrFail($form['treatment_id']);

        if(empty($form['services'])) {
            array_forget($form,'services');
        } else {
            $services = $form['services'];
            $treatment->update([
                'date' => $form['date'],
                'note' => $form['note']]);
            $treatment->services()->sync($services);
        }

        return redirect()->route('profile', ['id' => $treatment->user->id])->with('status','Treatment updated.');

    }

    public function delete(Request $request)
    {
        $treatment = Treatment::findOrFail($request->treatment_id);
        $client = User::findOrFail($treatment->user->id);

        $treatment->delete();

        return redirect()->route('profile', ['id' => $client->id])->with('status','Treatment deleted.');
    }
}
