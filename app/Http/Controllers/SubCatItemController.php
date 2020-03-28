<?php

namespace App\Http\Controllers;

use App\SubCatItem;
use Illuminate\Http\Request;
use App\PackageCategory;
use App\PackageSubcategory;
use Auth;
use Storage;

class SubCatItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(SubCatItem::all());
        return view('packages.subcatitems.index')
            ->with('subcatitems', SubCatItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.subcatitems.create')
            ->with('categories', PackageCategory::all())
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



        $input = $request->all();
        $this->validate(
            $request,
            [
                'cat' => 'required',
                'grp' => 'required',
                'subcat' => 'required',
                // 'desc'=>'required',
                'filename' => 'required|file|mimes:pptx,pdf,doc,docx,xls,mp3,mp4,pub|max:6048'

            ]
        );
       
        // new subcatitem instance
        $subcatrec = new SubCatItem;
        // cache the file
        $file = $request->file('filename');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'Item-' . time() . '.' . $file->getClientOriginalExtension();

      
        $subcatrec->catid = $request->cat;
        $subcatrec->grpid = $request->grp;
        $subcatrec->subcatid = $request->subcat;
        $subcatrec->file_name =  $filename; 
        // store the file
        // $request->file('Item-' . time() . '.' . $file->getClientOriginalExtension())->store('public/materials/');
        // save to storage/app/public/materials as the new $filename
        $path = $file->storeAs('public/materials', $filename);
        $subcatrec->authorid = Auth::user()->id;
        $subcatrec->save();

       

        // save to storage/app/public/materials as the new $filename
        // $path = $file->storeAs('public/materials', $filename);

        return redirect()->route('subcatitem.index')
            ->with('success', 'Sub-Category Item Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCatItem  $subCatItem
     * @return \Illuminate\Http\Response
     */
    public function show($subCatItem)
    {
        $item = SubCatItem::find($subCatItem);
        // dd($item->file_name->getClientOriginalExtension());
        return view('packages.subcatitems.show')
            ->with('item', $item)
            ->with('subcat', new PackageSubcategory);
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
    public function destroy($subCatItem)
    {
        SubCatItem::where('id', $subCatItem)->delete();
        return redirect()->route('subcatitem.index')->with('success', 'Sub Category Item Deleted');
    }
}
