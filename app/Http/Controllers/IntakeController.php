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
            'projectName' => ['required', 'min:5', 'max:50']
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

        return redirect('/intake');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $intake = Intake::findOrFail($id);


        $intake->update($input);
    }
}
