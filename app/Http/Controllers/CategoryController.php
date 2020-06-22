<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name'], '-'),
        ]);
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.show', compact('category'));
    }


    public function filteredProjects($slug)
    {
        $today = \Carbon\Carbon::now();
        $categories = Category::get();
        $category = Category::where('slug', $slug)->first();
        $category->setRelation('project', $category->project()->paginate(5));
        return view('projectFilter', compact(['category', 'categories', 'today']));
    }

    public function noEdit($slug)
    {
        $categories = Category::get();
        $category = Category::where('slug', $slug)->first();
        return view('categories.catAdmin', compact('category', 'categories'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('categories');
    }
}
