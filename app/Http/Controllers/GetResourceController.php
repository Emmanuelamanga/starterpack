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
use Symfony\Component\HttpFoundation\Response;

class GetResourceController extends Controller
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
        $pack = new  PackageSubcategory;

        return view('packages.getresources.index')
            ->with('resources', $resource)
            ->with('subcat', $pack);
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
            ->with('groups', MaterialGroup::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setgroup(Request $request)
    {
        // dd($request);
        // process the requested item batch batch
        $data = $request->all();
        $this->validate(
            $request,
            [
                'cat' => 'required',
                'grp' => 'required',
            ]
        );
        $items = SubCatItem::where('catid', $data['cat'])
            ->where('grpid', $data['grp'])->get();
        // dd($items);
        if (count($items) < 1) {
            return redirect()->back()->with('info', 'Sorry No Items for that selection.');
        }

        return view('packages.getresources.showitems')
            ->with('items', $items)
            ->with('subcat', new PackageSubcategory);
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
        $this->validate(
            $request,
            [
                'item' => 'required',
            ]
        );

        if (count($data) < 1) {
            return redirect()->back()->with('info', 'Select Atleast one item to process. !! ');
        }
        // confirm if user already has resource
        // $check = SubCatItem::where('subcatid', $data['subcat'])
        //             ->where('authorid',Auth::user()->id)
        //             ->where('grpid', $data['grp'])->exists();
        // if ($check) {
        //     return redirect()->back()->with('info', 'Resource Already availed'); 
        // }
        // GetResource::create($data);
        $newdata = new GetResource;
        for ($i = 0; $i < count($data); $i++) {
            $newdata->subcatitemid = $data['item'][$i];
            $newdata->userid =  Auth::user()->id;
        }
        $newdata->save();

        return redirect()->route('getresource.index')->with('success', 'Resource availed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GetResource  $getResource
     * @return \Illuminate\Http\Response
     */
    public function show($getResource)
    {
        $item = SubCatItem::find($getResource);

        return view('packages.getresources.show')
            ->with('item', $item)
            ->with('subcat', new PackageSubcategory);
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
        return redirect()->route('getresource.index')->with('success', 'Resource Removed ');
    }
}
