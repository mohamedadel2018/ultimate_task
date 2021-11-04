<?php

namespace App\Http\Controllers\searchCase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\searchCase;
use App\Models\User;

class printController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        //

        $searchCase  = searchCase::where('id',$id)->with('family_members','family_residences','disabilities','disabled_note','reproductiveHealth','family_project','lending_background','social_solidarity','searchCase_files','reproductiveHealth_note')->first();
        // dd(explode(',',$searchCase->lending_background[0]['papers_required_loan']));
        // dd($searchCase->disabled_note);
        return view('ethics_booth.search_case.print', compact('searchCase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
