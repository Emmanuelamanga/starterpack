<?php

namespace App\Http\Controllers;

use App\PackageCategory;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class PackageCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('packages.categories.index')
                ->with('categories', PackageCategory::all())
                ->with('user', new User);
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
        $this->validate(
            $request,
            [
                'cat' => 'required',
                'desc' => 'required'
            ]
        );

        $record = new PackageCategory;
        $record->title = $request->cat;
        $record->discription = $request->desc;
        $record->creatorid = Auth::user()->id;
        $record->save();

        return redirect()->route('category.index', ['success' => 'Category Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function show($packageCategory)
    {
        $pc = PackageCategory::find($packageCategory);
        // dd($pc);
        return view('packages.categories.show')->with('category', $pc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($packageCategory)
    {
        $pc = PackageCategory::find($packageCategory);
        // dd($pc);
        return view('packages.categories.edit')->with('category', $pc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $packageCategory)
    {
        $this->validate(
            $request,
            [
                'cat' => 'required',
                'desc' => 'required'
            ]
        );

        DB::table('package_categories')
            ->where('id', $packageCategory)
            ->update([
                'title' => $request->cat,
                'discription' => $request->desc,
                'creatorid' => Auth::user()->id,
            ]);

        return redirect()->route('category.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($packageCategory)
    {

        PackageCategory::where('id', $packageCategory)->delete();
        // dd($packageCategory);
        // // $pc->id->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted');
    }
}
