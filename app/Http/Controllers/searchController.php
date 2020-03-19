<?php


namespace App\Http\Controllers;

use App\PackageSubcategory;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        
        if($request->ajax()) {
          
            $data = PackageSubcategory::where('catid', 'LIKE', $request->cat.'%')
            		// ->join('')
                	->get();
           
          
           
            if (count($data)>0) {
              
                // $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                // foreach ($data as $row){
                   
                //     $output .= '<li class="list-group-item">'.$row->sub_title.'</li>';
                // }
              
                // $output .= '</ul>';
                $output = $data;
                 json_encode($output);
            }
            else {
             
                // $output .= '<li class="list-group-item">'.'No results'.'</li>';
                  $output = '';
            }
           
            return $output;
        }
    }
}