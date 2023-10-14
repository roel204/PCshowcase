<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class ComputerController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function overview()
    {
        $computers = Computer::all();
        return view('overview', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
        ]);

        $user = Auth::user();
        $user->computers()->create([
            'name' => $request->input('name'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
        ]);

        return redirect()->route('home')->with('success', 'Computer added successfully.');
    }

    public function delete($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return redirect()->route('computer.overview')->with('success', 'Computer deleted successfully.');
    }
}
