<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(idea $idea){
        $liker = auth()->user();

        $liker->likes()->attach($idea);

        return redirect()->route('dashboard')->with('success', 'The post liked successfully!');
    }

    public function dislike(idea $idea){

        $liker = auth()->user();

        $liker->likes()->detach($idea);

        return redirect()->route('dashboard')->with('success', 'The post liked successfully!');
    }
}
