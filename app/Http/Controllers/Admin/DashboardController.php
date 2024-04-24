<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request){

        $totalUsers = User::count();
        $totalIdeas = Idea::count();

        return view('admin.dashboard', compact('totalUsers', 'totalIdeas'));
    }
}
