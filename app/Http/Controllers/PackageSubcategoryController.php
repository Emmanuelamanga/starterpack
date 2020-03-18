<?php

namespace App\Http\Controllers;

use App\PackageSubcategory;
use App\PackageCategory;
use Illuminate\Http\Request;
use Auth;
use DB;

class PackageSubcategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcats = PackageSubcategory::all();
        // dd($subcats);
         return view('packages.subcategories.index')
            ->with('subcats', $subcats);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('packages.subcategories.create')
            ->with('categories', PackageCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
         $this->validate($request,
            [
                'cat'=>'required',
                'desc'=>'required',
                'grp'=>'required',
                'subcat'=>'required',

            ]);

        $subcatrec = new PackageSubcategory;
        $subcatrec->catid = $request->cat;
        $subcatrec->classid = $request->grp;
        $subcatrec->sub_title = $request->subcat;
        $subcatrec->sub_desc = $request->desc;        
        $subcatrec->sub_authorid = Auth::user()->id;
        $subcatrec->save();

        return redirect()->route('subcategory.index',['success'=>'Sub-Category Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageSubcategory  $packageSubcategory
     * @return \Illuminate\Http\Response
     */
    public function show( $packageSubcategory)
    {
         $spc = PackageSubcategory::find($packageSubcategory);
        // dd($pc);
         return view('packages.subcategories.show')->with('subcat', $spc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageSubcategory  $packageSubcategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $packageSubcategory)
    {
         $spc = PackageSubcategory::find($packageSubcategory);
        // dd($pc);
         return view('packages.subcategories.edit')->with('subcategory', $spc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageSubcategory  $packageSubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $packageSubcategory)
    {
         $this->validate($request,
            [
                'cat'=>'required',
                'desc'=>'required'
            ]);

        DB::table('package_subcategories')
        ->where('id', $packageSubcategory)
        ->update([
             'sub_title' => $request->cat,
            'sub_desc' => $request->desc,
            'sub_authorid' => Auth::user()->id,
        ]);

        return redirect()->route('subcategory.index')->with('success','Sub-Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageSubcategory  $packageSubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($packageSubcategory)
    {
        
        PackageSubcategory::where('id', $packageSubcategory)->delete();
        // dd($packageCategory);
        // // $pc->id->delete();
        return redirect()->route('subcategory.index')->with('success', 'Sub Category Deleted');
    }
}
