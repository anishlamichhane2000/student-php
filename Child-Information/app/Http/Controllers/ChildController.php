<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::all();
        return view('child.index', compact('children'));
    }

    public function save(Request $request)
    {
        // Validation (customize as needed)
        $request->validate([
            'child_first_name' => 'required|array',
            'child_first_name.*' => 'required|string',
            'child_last_name' => 'required|array',
            'child_last_name.*' => 'required|string',
            'child_age' => 'required|array',
            'child_age.*' => 'required|numeric',
            'child_gender' => 'required|array',
            'child_gender.*' => 'required|string',
            'child_address' => 'nullable|array',
            'child_address.*' => 'nullable|string',
            'child_city' => 'nullable|array',
            'child_city.*' => 'nullable|string',
            'child_state' => 'nullable|array',
            'child_state.*' => 'nullable|string',
            'child_country' => 'nullable|array',
            'child_country.*' => 'nullable|string',
            'child_zip' => 'nullable|array',
            'child_zip.*' => 'nullable|string',
            // Add more validation rules here
        ]);

        // Loop through submitted data and save to the database
        foreach ($request->child_first_name as $index => $childFirstName) {
            Child::create([
                'child_first_name' => $childFirstName,
                'child_last_name' => $request->child_last_name[$index],
                'child_age' => $request->child_age[$index],
                'child_gender' => $request->child_gender[$index],
                'child_address' => $request->child_address[$index],
                'child_city' => $request->child_city[$index],
                'child_state' => $request->child_state[$index],
                'child_country' => $request->child_country[$index],
                'child_zip' => $request->child_zip[$index],
                // Add more fields here
            ]);
        }

        return redirect()->route('child.index')->with('success', 'Child information saved successfully.');
    }
}
