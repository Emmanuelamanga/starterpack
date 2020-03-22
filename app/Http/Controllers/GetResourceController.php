<?php

namespace App\Http\Controllers;

use App\GetResource;
use Illuminate\Http\Request;
use App\PackageCategory;
use DB;
use App\MaterialGroup;

class GetResourceController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth');
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tables 
        // package_subcategories
        // sub_cat_items
        // material_groups

        $data = DB::table('package_subcategories')
            // ->where('package_subcategories.catid',  1)
            ->join('sub_cat_items', 'package_subcategories.id', '=', 'sub_cat_items.subcatid')
            ->join('material_groups', 'package_subcategories.classid', '=', 'material_groups.id')
            ->whereNull('sub_cat_items.deleted_at')
            ->get();

        // dd(json_encode($data));
            dd($data);

        return view('packages.getresources.index')
                ->with('resources', GetResource::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('packages.getresources.create')
       ->with('categories', PackageCategory::all())
        // ->with('groups', MaterialGroup::all())
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function show(GetResource $getResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function edit(GetResource $getResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GetResource $getResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(GetResource $getResource)
    {
        //
    }
}
