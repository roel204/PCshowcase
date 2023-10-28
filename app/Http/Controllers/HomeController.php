<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Computer;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $selectedTags = $request->input('tags', []);

        $computers = Computer::where(function ($query) use ($search) {
            $query->when($search, function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('cpu', 'like', '%' . $search . '%')
                    ->orWhere('gpu', 'like', '%' . $search . '%');
            });
        })->when(count($selectedTags) > 0, function ($query) use ($selectedTags) {
            $query->whereHas('tags', function ($q) use ($selectedTags) {
                $q->whereIn('tags.id', $selectedTags);
            }, '=', count($selectedTags));
        })->get();



        $tags = Tag::all();

        return view('home', compact('computers', 'tags'));
    }


}
