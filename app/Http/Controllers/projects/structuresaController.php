<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\tasks;
use App\Models\user;
use Auth;
class structuresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ethics_booth.projects.structure');
    }


 public function structureCounts()
    {
        //
        $projects_count = count(projects::all());
        $supervisors_count = user::count();
        $tasks_count = tasks::where('id', Auth::id())->count();
        return  response()->json(['projects_count' => $projects_count , 'supervisors_count' =>  $supervisors_count ,'tasks_count' =>  $tasks_count]);
    }



    public function searchAll(Request $request){


        $projects_showall  = projects::where('id','%'.$request->words.'%')->orWhere('name','like','%'.$request->words.'%')->count();
        $projects_user  = user::where('first_name','%'.$request->words.'%')->orWhere('job_title','like','%'.$request->words.'%')->orWhere('mobile','like','%'.$request->words.'%')->count();
        // dd($searchCase_showall);
              $words =   $request->words;
// dd( $request->words);
        $users = User::whereRoleIs('admin')->when($request->search,function ($query) use ($request){
            return $query->where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(7);
        if($projects_showall > 0 ){
            return view('ethics_booth.projects.index' ,compact('words'));
            }
            elseif($projects_user > 0 ){
                return view('ethics_booth.admin.users.index' ,compact('words','users'));
            }else{
                return view('ethics_booth.search_case.structure',compact('words'));
            }


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
