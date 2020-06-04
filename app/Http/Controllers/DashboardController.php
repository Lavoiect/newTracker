<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $category = Category::where('name', 'Active')->first();
        $upcoming = Category::where('name', 'Upcoming')->first();
        return view('dashboard.index', compact('category', 'upcoming'));
    }

    public function admin()
    {
        return view('admin.index');
    }
    public function projects()
    {
        $publishedProjects = Project::where('status', 1)->latest()->get();
        $draftProjects = Project::where('status', 0)->latest()->get();
        return view('admin.projects', compact('publishedProjects', 'draftProjects'));
    }
}
