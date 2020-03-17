<?php

namespace App\Http\Controllers;

use App\PackageCategory;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('packages.categories.index')
            ->with('categories', PackageCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'disc'=>'required'
            ]);
        $record = new PackageCategory;
        $record->title = $request->title;
        $record->discription = $request->disc;
        $record->save();

        return redirect()->route('category.index',['success'=>'Category Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PackageCategory $packageCategory)
    {
         return view('packages.categories.show', compact('category',$packageCategory));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageCategory $packageCategory)
    {
         return view('packages.categories.edit', compact('category',$packageCategory));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageCategory $packageCategory)
    {
         $this->validate($request,
            [
                'title'=>'required',
                'disc'=>'required'
            ]);
        $record = new PackageCategory;
        $record->title = $request->title;
        $record->discription = $request->disc;
        $record->save();

        return redirect()->route('category.index',['success'=>'Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageCategory $packageCategory)
    {
        $packageCategory->id->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted');
    }
}
