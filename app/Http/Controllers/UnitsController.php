<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Session;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

       return view('units.index')->with('units',Unit::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $units = new Unit();
        $units->name = $request->uname;
        $units->number = $request->unumber;
        $units->save();
        Session::flash('success','Unit Created Successfully');
        return redirect()->route('units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('units.edit')->with('unit',Unit::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $unit = Unit::find($id);
        $unit->name = $request->uname;
        $unit->number = $request->unumber;
        $unit->save();
        Session::flash('success','Unit Updated Successfully');
        return redirect()->route('units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $unit = Unit::find($id);
       $unit->delete();
       Session::flash('success','Unit Deleted Successfully');
       return redirect()->route('units');
    }
}
