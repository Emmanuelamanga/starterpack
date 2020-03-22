<?php

namespace App\Http\Controllers;

use App\GetResource;
use Illuminate\Http\Request;
use App\PackageCategory;
use App\PackageSubcategory;
use DB;
use App\MaterialGroup;
use Auth;
use App\SubCatItem;
use Storage;

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

        // $data = DB::table('package_subcategories')
        //     // ->where('package_subcategories.catid',  1)
        //     ->join('sub_cat_items', 'package_subcategories.id', '=', 'sub_cat_items.subcatid')
        //     ->join('material_groups', 'package_subcategories.classid', '=', 'material_groups.id')
        //     ->whereNull('sub_cat_items.deleted_at')
        //     ->get();

        // // dd(json_encode($data));
        //     dd($data);

        $resource = GetResource::where('userid', Auth::user()->id)->get();

        return view('packages.getresources.index')
                ->with('resources', $resource)
                ->with('subcat', new PackageSubcategory);
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
        $data = $request->all();
        // dd($data );
        $this->validate($request, 
        [
            'cat' => 'required',
            'grp'=>'required',
            'subcat'=> 'required',
        ]);

        // GetResource::create($data);
        $newdata = new GetResource;
        $newdata->subcatitemid = $request->subcat;
        $newdata->userid =  Auth::user()->id;
        $newdata->save();

        return redirect()->route('getresource.index')->with('success','Resource availed');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function show($getResource)
    {   
        // dd(SubCatItem::find($getResource));
        $item = SubCatItem::find($getResource);
        //  $contents = Storage::disk('local')->url($item->file_name);
        // $path = base_path() . '/public/materials/'.$item->file_name;
        // $path = storage_path('app\public\materials\\').$item->file_name;
        // dd($item->file_name);
        return view('packages.getresources.show')
                ->with('item',$item);
                // ->with('path',$path)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    // public function edit(GetResource $getResource)
    // {
    //     //
    // }

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
    public function destroy($getResource)
    {
        GetResource::where('id', $getResource)->delete();
        return redirect()->route('getresource.index')->with('success', 'Category Item Deleted');
    }
}
