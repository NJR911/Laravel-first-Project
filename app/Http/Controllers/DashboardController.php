<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $ideas = Idea::orderBy('created_at', 'DESC');

        // checking if there is the search value
        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like','%' . request()->get('search', '') . '%');
        }

        // $idea = new Idea();
        // $idea->content = 'walo';
        // $idea->likes = 0;
        // $idea->save();

        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }

}
