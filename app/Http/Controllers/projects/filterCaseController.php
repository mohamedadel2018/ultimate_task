<?php

namespace App\Http\Controllers\searchCase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class filterCaseController extends Controller
{
    //

    public function index()
    {

        return view('ethics_booth.search_case.Filter_Case');
    }

}
