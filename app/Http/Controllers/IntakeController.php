<?php

namespace App\Http\Controllers;

use App\Intake;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    public function index()
    {
        return view('intakeForm');
    }

    public function messages()
    {
        $intakes = Intake::latest()->get();
        return view('admin.messages', compact('intakes'));
    }

    public function store(Request $request)
    {

        if ($request->regions) {
            $regionString = implode(", ", $request->get('regions'));
            $request->merge(['regions' => $regionString]);
        }
        $rules = [
            'projectName' => ['required', 'min:5', 'max:50'],
            'attach' => 'max:7097152'
        ];
        $this->validate($request, $rules);
        $input = $request->all();

        // file upload
        if ($file = $request->file('attach')) {
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/intake_attachments/', $name);
            $input['attach'] = $name;
        }

        $intake = Intake::create($input);

        return redirect('/intake')->with('added', 'Thank you for submitting a request to the Field Operations Learning Services team.  Please note that our primary strategic focus for Q4 2020 is implementing critical updates to our Field Technician Onboarding Program.  All new requests received after October 15, 2020 will be prioritized accordingly.  For urgent requests, please reach out to Abbie O’Dell directly with details of the project for assistance.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $intake = Intake::findOrFail($id);


        $intake->update($input);
    }

    public function destroy($id)
    {
        $intake = Intake::findOrFail($id);
        $intake->delete();
        return redirect('messages');
    }
}
