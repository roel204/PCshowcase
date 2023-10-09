<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
        ]);

        Computer::create([
            'name' => $request->input('name'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
        ]);

        return redirect()->route('home')->with('success', 'Computer added successfully.');
    }
}
