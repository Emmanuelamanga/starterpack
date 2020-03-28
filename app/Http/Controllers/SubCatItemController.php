<?php

namespace App\Http\Controllers;

use App\GetResource;
use App\SubCatItem;
use Illuminate\Http\Request;
use App\PackageCategory;
use App\PackageSubcategory;
use App\User;
use Auth;
use Storage;
use File;

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
              ->with('subcatitems', SubCatItem::all())
              ->with('deleteditems', SubCatItem::onlyTrashed()->get())
              ->with('subcat', new PackageSubcategory)
              ->with('category', new packageCategory)
              ->with('user', new User);
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
        // $item = SubCatItem::where('id', $subCatItem)
        //         ->withTrashed()
        //         ->get();

        // dd($item);
        return view('packages.subcatitems.show')
            ->with('item', $item)
            ->with('subcat', new PackageSubcategory);
    }
    /**
     * 
     */
    public function viewdoc($id)
    {
       $document_name = SubCatItem::find($id);
         if($document_name){
                  $file = base_path().'\public\storage\materials\\'.$document_name->file_name;
                // dd($file);
                  if (file_exists($file)){

                   $ext =File::extension($file);
                  
                    if($ext=='pdf'){
                        $content_types='application/pdf';
                       }elseif ($ext=='doc') {
                         $content_types='application/msword';  
                       }elseif ($ext=='docx') {
                         $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';  
                       }elseif ($ext=='xls') {
                         $content_types='application/vnd.ms-excel';  
                       }elseif ($ext=='xlsx') {
                         $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';  
                       }elseif ($ext=='txt') {
                         $content_types='application/octet-stream';  
                       }
                   
                    return response(file_get_contents($file),200)
                           ->header('Content-Type',$content_types);
                                                             
                }else{
                 exit('Requested file does not exist on our server!');
                }

           }else{
             exit('Invalid Request');
           } 
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
        // update author
        $auth =  SubCatItem::find($subCatItem);
        $auth->authorid = Auth::user()->id;
        $auth->save();
        // soft delete item
        SubCatItem::where('id', $subCatItem)->delete();
        // update get_resource table
        GetResource::where('subcatitemid', $subCatItem)->delete();

        return redirect()->route('subcatitem.index')->with('success', 'Sub Category Item Deleted');
    }
    /**
     * 
     */
    public function restoreitem($subCatItem){
         // update author
        $auth =  SubCatItem::where('id',$subCatItem)->withTrashed()->first();
        $auth->authorid = Auth::user()->id;
        $auth->save();
        // soft restore item
        SubCatItem::where('id', $subCatItem)->restore();
        // update get_resource table
        GetResource::where('subcatitemid', $subCatItem)->restore();

        return redirect()->route('subcatitem.index')->with('success', 'Sub Category Item Restored');
    }
}
