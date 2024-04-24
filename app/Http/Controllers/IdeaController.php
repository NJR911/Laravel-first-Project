<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdeaController extends Controller
{
    // Showing single Idea
    public function show(Idea $idea)
    {

        // return view('ideas.show', [
        //     'idea' => $idea
        // ]);
        return view('ideas.show', compact('idea'));
    }


    // Creating
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:2|max:250',
            'title' => 'min:1|max:50',
            'image' => 'image',
            'category' => 'required|exists:categories,id',
        ]);

        $validated['user_id'] = auth()->id();

        if (request('image')) {
            $imagePath = request()->file('image')->store('ideas', 'public');
            $validated['image'] = $imagePath;

        }

        Idea::create($validated);
        // [
        //     'content' => request()->get('content', ''),
        // ]
        $categories = Category::all();
        dd();
        return view('ideas.shared.submit-idea', compact('categories'))->with('success', 'Article created successfully!');

        return redirect()->route('dashboard')->with('success', 'Article created successfully!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('ideas.shared.submit-idea', compact('categories'));
    }



    // Deleting
    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }

        // where id=1?, first for first item matching the id
        // $idea = Idea::where('id', $id)->firstOrFail()->delete();
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successffuly !');
    }

    // Updating
    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));

        $categories = Category::all();
        return view('ideas.show', compact('idea', 'editing', 'categories'));
    }

    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:2|max:250',
            'title' => 'min:1|max:50',
            'image' => 'image',
        ]);

        if (request('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($idea->image ?? '');
        }

        // $idea->content = request()->get('content', '');
        // $idea->save();
        $idea->update($validated);

        // return redirect()->route('idea.show', $idea->id)->with('success', "Idea updated successfully !");
        return redirect()->route('dashboard', $idea->id)->with('success', "Idea updated successfully !");
    }
}

