<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function home()
    {
        $projects = Project::where('status', 1)->latest()->get();
        // $projects = Project::latest()->get();
        return view('welcome', compact('projects'));
    }

    public function index()
    {
        $projects = Project::where('status', 1)->latest()->get();
        $categories = Category::get();
        // $projects = Project::latest()->get();

        return view('projects.index', compact(['projects', 'categories', 'filtered']));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'min:10', 'max:50']
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        // meta data
        $input['slug'] = Str::slug($request->title);
        $input['meta_title'] = Str::limit($request->title, 55);
        $input['meta_desc'] = Str::limit($request->title, 155);

        // file upload
        if ($file = $request->file('attachment')) {
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/attachments/', $name);
            $input['attachment'] = $name;
        }
        $projectByUser = $request->user()->projects()->create($input);
        //$project = Project::create($input);
        if ($request->category_id) {
            $projectByUser->category()->sync($request->category_id);
        };
        return redirect('/projects')->with('status', 'Project added');
    }
    public function show($slug)
    {
        $project = Project::whereSlug($slug)->first();
        //$project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }
    public function edit($slug)
    {
        $categories = Category::latest()->get();
        //$project = Project::findOrFail($id);
        $project = Project::whereSlug($slug)->first();

        $fc = array();
        foreach ($project->category as $c) {
            $fc[] = $c->id - 1;
        }

        $filtered = Arr::except($categories, $fc);

        return view('projects.edit', compact('project', 'categories', 'filtered'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $project = Project::findOrFail($id);

        // file upload
        if ($file = $request->file('attachment')) {
            if ($project->attachment) {
                unlink('images/attachments/' . $project->attachment);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/attachments/', $name);
            $input['attachment'] = $name;
        }

        $project->update($input);
        if ($request->category_id) {
            $project->category()->sync($request->category_id);
        };
        return redirect('projects');
    }
    public function delete(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('projects');
    }
    public function trash()
    {
        $trashedProjects = Project::onlyTrashed()->get();
        return view('projects.trashedProjects', compact('trashedProjects'));
    }
    public function restore($id)
    {
        $restoreProject = Project::onlyTrashed()->findOrFail($id);
        $restoreProject->restore($restoreProject);
        return redirect('/projects');
    }
    public function permDelete($id)
    {
        $permDeleteProject = Project::onlyTrashed()->findOrFail($id);
        $permDeleteProject->forceDelete($permDeleteProject);
        return back();
    }
}
