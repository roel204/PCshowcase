<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Computer;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class ComputerController extends Controller
{
    public function overview()
    {
        $computers = auth()->user()->computers;

        return view('overview', compact('computers'));
    }

    public function show($id)
    {
        $computer = Computer::with('comments')->where('id', $id)->firstOrFail();

        return view('show', compact('computer'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('create', compact('tags'));
    }

    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        $this->authorize('edit', $computer);
        $allTags = Tag::all();
        $computerTags = $computer->tags->pluck('id')->toArray();

        return view('edit', compact('computer', 'allTags', 'computerTags'));
    }

    public function toggleStatus($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->update(['is_online' => !$computer->is_online]);

        return redirect()->route('computer.overview')->with('success', 'Status updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'cpu' => 'required|string|max:255',
            'gpu' => 'required|string|max:255',
            'image_link' => 'nullable|url|max:5000',
        ]);

        $user = Auth::user();
        $computer = $user->computers()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
            'image_link' => $request->input('image_link'),
        ]);

        $computer->tags()->sync($request->input('tags'));

        return redirect()->route('computer.overview')->with('success', 'Computer added successfully.');
    }

    public function delete($id)
    {
        $computer = Computer::findOrFail($id);
        $this->authorize('delete', $computer);
        $computer->delete();

        return redirect()->route('computer.overview')->with('success', 'Computer deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'cpu' => 'required|string|max:255',
            'gpu' => 'required|string|max:255',
            'image_link' => 'nullable|url|max:5000',
        ]);

        $computer = Computer::findOrFail($id);

        $computer->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
            'image_link' => $request->input('image_link'),
        ]);

        $computer->tags()->sync($request->input('tags'));

        return redirect()->route('computer.overview')->with('success', 'Computer updated successfully.');
    }

    public function comment(Request $request, Computer $computer)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->computer_id = $computer->id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->route('computer.show', ['id' => $computer->id]);
    }
}
