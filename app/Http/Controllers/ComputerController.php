<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\computer;
use Illuminate\Support\Facades\Auth;

class ComputerController extends Controller
{

    public function overview()
    {
        $computers = auth()->user()->computers;

        return view('overview', compact('computers'));
    }

    public function show($id)
    {
        $computer = computer::where('id', $id)->firstOrFail();

        return view('show', compact('computer'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $computer = computer::findOrFail($id);
        $this->authorize('edit', $computer);

        return view('edit', compact('computer'));
    }

    public function toggleStatus($id)
    {
        $computer = computer::findOrFail($id);
        $computer->update(['is_online' => !$computer->is_online]);

        return redirect()->route('computer.overview')->with('success', 'Status updated successfully.');
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

        return redirect()->route('computer.overview')->with('success', 'Computer added successfully.');
    }

    public function delete($id)
    {
        $computer = computer::findOrFail($id);
        $this->authorize('delete', $computer);
        $computer->delete();

        return redirect()->route('computer.overview')->with('success', 'Computer deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
        ]);

        $computer = computer::findOrFail($id);

        $computer->update([
            'name' => $request->input('name'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
        ]);

        return redirect()->route('computer.overview')->with('success', 'Computer updated successfully.');
    }
}
