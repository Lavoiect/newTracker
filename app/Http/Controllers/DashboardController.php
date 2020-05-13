<?php

namespace App\Http\Controllers;

use App\Project;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
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
