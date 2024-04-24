<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{
    public function index(Request $request){

        $ideas = Idea::latest()->paginate(5);

        return view('admin.ideas.index', compact('ideas'));
    }
}
