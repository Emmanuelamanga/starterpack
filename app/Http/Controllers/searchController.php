<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PackageSubcategory;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GetResource;
use App\PackageCategory;
use App\SubCatItem;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            // $data = PackageSubcategory::where('catid', 'LIKE', $request->cat.'%')
            // ->join('')
            // ->get();
            $data = PackageSubcategory::where('catid', 'LIKE', $request->cat . '%')
                ->leftJoin('material_groups', 'package_subcategories.classid', '=', 'material_groups.id')
                ->get();
            // $data = DB::table('package_subcategories')
            //         ->where('catid', 'LIKE', $request->cat.'%')
            //         ->leftJoin('material_groups', 'package_subcategories.classid', '=', 'material_groups.id')
            //         ->get();




            if ($count = count($data) > 0) {

                // $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                // foreach ($data as $row){

                //     $output .= '<li class="list-group-item">'.$row->sub_title.'</li>';
                // }

                // $output .= '</ul>';

                $output = $data;
                json_encode($output);

                // for ($i=0; $i < $count; $i++) { 
                //    if () {

                //    }
                // }

            } else {

                // $output .= '<li class="list-group-item">'.'No results'.'</li>';
                $output = '';
            }

            return $output;
        }
    }
    public function searchresource(Request $request)
    {

        if ($request->ajax()) {

            // $data = PackageSubcategory::where('catid', 'LIKE', $request->cat.'%')
            //                 ->leftJoin('material_groups', 'package_subcategories.classid', '=', 'material_groups.id')
            //                 ->get();

            $data = DB::table('package_subcategories')
                ->where('package_subcategories.catid', 'LIKE', $request->cat . '%')
                ->join('sub_cat_items', 'package_subcategories.id', '=', 'sub_cat_items.subcatid')
                ->join('material_groups', 'package_subcategories.catid', '=', 'material_groups.id')
                ->whereNull('sub_cat_items.deleted_at')
                ->get();

            if ($count = count($data) > 0) {

                $output = $data;
                json_encode($output);
            } else {

                $output = '';
            }

            return $output;
        }
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
            ->where('grpid', $data['grp'])
            // ->leftJoin('get_resources', 'sub_cat_items.subcatid', '!=' , 'get_resources.subcatitemid')
            ->groupBy('sub_cat_items.subcatid')
            ->get();
        dd($items);
        if (count($items) < 1) {
            return redirect()->back()->with('info', 'Sorry No Items for that selection.');
        }

        return view('packages.getresources.showitems')
            ->with('items', $items)
            ->with('subcat', new PackageSubcategory)
            ->with('cat', new PackageCategory);
    }
}
