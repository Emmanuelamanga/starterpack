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

        $resource = DB::table('get_resources')
            // ->select('id', 'subcatitemid', 'userid', 'created_at', 'updated_at', 'deleted_at')
            ->where('userid',  Auth::user()->id)
            ->where('deleted_at', NULL)
            ->groupBy('subcatitemid')
            ->get();
        // $resource = DB::select('SELECT  * FROM get_resources WHERE userid=? GROUP BY subcatitemid',[Auth::user()->id]);
        // dd($resource);

        return view('packages.getresources.index')
            ->with('resources', $resource)
            ->with('subcat', new  PackageSubcategory)
            ->with('category', new packageCategory);
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
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data );
        // $this->validate(
        //     $request,
        //     [
        //         'item[]' => 'required',
        //     ]
        // );


        // confirm if user already has resource
        // $check = SubCatItem::where('subcatid', $data['subcat'])
        //             ->where('authorid',Auth::user()->id)
        //             ->where('grpid', $data['grp'])->exists();
        // if ($check) {
        //     return redirect()->back()->with('info', 'Resource Already availed'); 
        // }
        // GetResource::create($data); 

        for ($i = 0; $i < $dat = count($data) - 1; $i++) {
            // dd(count($data)-1);
            // dd($data['item'][$i]);
            $newdata = new GetResource;
            $newdata->subcatitemid = $data['item'][$i];
            $newdata->userid =  Auth::user()->id;
            $newdata->save();
        }



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
        // dd($getResource);
        // $item = SubCatItem::where('id',$getResource)
        //                     ->where('deleted_at', NULL)
        //                     ->get();
        // dd($item->file_name->getClientOriginalExtension());
        $item = SubCatItem::find($getResource);
        // dd($item);
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
        GetResource::where('id', $getResource)
            ->where('userid',  Auth::user()->id)
            ->delete();
        return redirect()->route('getresource.index')->with('success', 'Resource Removed ');
    }
}
