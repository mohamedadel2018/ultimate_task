<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class projectsController extends Controller
{
    //
    public function __construct()
    {
        //middleware for permission create read update delete
        $this->middleware(['permission:project_create'])->only('index');
        $this->middleware(['permission:project_read'])->only('show_all');

    } //end


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('ethics_booth.projects.index');
    }


    public function show_all()
    {
        return view('ethics_booth.projects.show_all');
    }



}
