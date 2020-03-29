<?php

namespace App\Http\Controllers;

use App\MaterialGroup;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class MaterialGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matg = MaterialGroup::all();
        return view('packages.materialgroups.index')
            ->with('materialgroups', $matg)
            ->with('user', new User);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.materialgroups.create');
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
                'classname' => 'required',
                'desc' => 'required'
            ]
        );

        $newroom = new MaterialGroup;
        $newroom->room_name = $input['classname'];
        $newroom->room_desc = $input['desc'];
        $newroom->room_authorid = Auth::user()->id;
        $newroom->save();


        return redirect()->route('materialgroup.index')->with('success', 'Classroom Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialGroup  $materialGroup
     * @return \Illuminate\Http\Response
     */
    public function show($materialGroup)
    {
        $matg = MaterialGroup::find($materialGroup);
        return view('packages.materialgroups.show')
            ->with('materialGroup',  $matg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialGroup  $materialGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($materialGroup)
    {
        $matg = MaterialGroup::find($materialGroup);
        return view('packages.materialgroups.edit')
            ->with('materialGroup',  $matg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialGroup  $materialGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materialGroup)
    {
        $this->validate(
            $request,
            [
                'classname' => 'required',
                'desc' => 'required'
            ]
        );

        DB::table('material_groups')
            ->where('id', $materialGroup)
            ->update([
                'room_name' => $request->classname,
                'room_desc' =>  $request->desc,
                'room_authorid' => Auth::user()->id,
            ]);

        return redirect()->route('materialgroup.index')
            ->with('success', 'Classroom Updated..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialGroup  $materialGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($materialGroup)
    {
        MaterialGroup::where('id', $materialGroup)->delete();

        return redirect()->route('materialgroup.index')->with('success', 'Classroom Deleted');
    }
}
