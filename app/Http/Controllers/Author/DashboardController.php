<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        $categories = Category::all();
        return view('author.dashboard', compact('categories'));
    }
}
