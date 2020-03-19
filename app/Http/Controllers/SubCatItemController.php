<?php

namespace App\Http\Controllers;

use App\SubCatItem;
use Illuminate\Http\Request;
use App\PackageCategory;
use App\PackageSubcategory;

class SubCatItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('packages.subcatitems.index')
                ->with('subcatitems',SubCatItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.subcatitems.create')
                ->with('categories',PackageCategory::all())
                ->with('subcats', PackageSubcategory::all());
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
     * @param  \App\SubCatItem  $subCatItem
     * @return \Illuminate\Http\Response
     */
    public function show(SubCatItem $subCatItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCatItem  $subCatItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCatItem $subCatItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCatItem  $subCatItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCatItem $subCatItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCatItem  $subCatItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCatItem $subCatItem)
    {
        //
    }
}
