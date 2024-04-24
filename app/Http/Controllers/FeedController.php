<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');


        $ideas = idea::whereIn('user_id', $followingIDs)->latest();

        // checking if there is the search value
        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like','%' . request()->get('search', '') . '%');
        }


        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
