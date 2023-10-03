<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Cat;

/**
 * Summary of CategoryController
 */
class CategoryController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cats=Cat::get();
        return view('Categories.CategoryTable',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $cat=new Cat();
        $cat->name=$request->name;
        $cat->save();
        return redirect()->route('cat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat=Cat::find($id);
        // $cats=Cat::where()->get();
        return view('Categories.Show',compact('cat'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Cat::find($id);
        return view('Categories.UpdateCategory',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $cat=Cat::find($id);
        $cat->name=$request->name;
        $cat->save();
        return redirect()->route('cat');
    }
    /**
     * Summary of destroy
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function destroy(string $id){
        $cat=Cat::findOrFail($id);
    $cat->delete();
        return redirect()->route('cat');
}
}

