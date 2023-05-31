<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('form.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $form = Form::create([
            'name' => $validatedData['name'],
        ]);

        // $fields = [];
        // foreach ($validatedData['fields'] as $fieldData) {
        //     $fields[] = [
        //         'name' => $fieldData['name'],
        //         'type' => $fieldData['type'],
        //         'value' => $fieldData['value'],
        //         // Add other field properties as needed
        //     ];
        // }

        // $form->fields()->createMany($fields);

        return redirect()->route('form.show', $form->id);
    }

    public function show(Form $form)
    {
        return view('show_form', compact('form'));
    }
}
