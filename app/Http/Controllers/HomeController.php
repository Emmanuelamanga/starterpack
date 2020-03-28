<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\GetResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $resource = GetResource::where('userid', Auth::user()->id)->get();

        // return view('home')->with('resources',$resource);
        return redirect()->route('getresource.index');
    }
}
