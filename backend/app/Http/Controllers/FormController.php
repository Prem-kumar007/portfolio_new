<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);


         DB::table('react_data')->insert($validatedData);

        return response()->json(['message' => 'Form submitted successfully','request_data'=>$request->input()],200);
    }
}
