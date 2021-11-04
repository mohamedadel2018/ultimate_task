<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Notification;
use App\Models\projects;
use App\Models\user;
use App\Notifications\ProjectsNotify;
use App\Http\Requests\addprojectRequest;

class apiprojectsController extends Controller
{
    //
    public function __construct()
    {
        //middleware for permission create read update delete
        $this->middleware(['permission:project_read'])->only('index');
        $this->middleware(['permission:project_create'])->only('create');
        $this->middleware(['permission:project_update'])->only('edit');
        $this->middleware(['permission:project_delete'])->only('destroy');

    } // end for __construct

    public function index()
    {


        $allprojects  = projects::where('user_id',Auth::id())->with('tasks')->latest()->paginate(15);

        return  response()->json($allprojects);
    }

    public function userPermissions()
    {
        $project_create =   Auth::user()->hasPermission('project_create');
        $project_read =   Auth::user()->hasPermission('project_read');
        $project_update =   Auth::user()->hasPermission('project_update');
        $project_delete =   Auth::user()->hasPermission('project_delete');
        return  response()->json(['project_update' => $project_update , 'project_delete' =>  $project_delete  ]);
    }





    public function store(addprojectRequest $request)
    {
        dd($request->all());
       $add_project = new  projects();
       $add_project->name = $request->addprojectForm['name'];
       $add_project->description =  $request->addprojectForm['description'];
       $add_project->location =  $request->addprojectForm['location'];
       $add_project->created_by =  Auth::user()->first_name . ' ' . Auth::user()->last_name;
       $add_project->user_id = Auth::id();


       $add_project->save();
       //start Notification



       //End  Notification
       return response()->json([], 200);

    }




    public function update($id,Request $request)
    {

        $update_project = projects::find($id);
        $update_project->name = $request->name;
        $update_project->description = $request->description;
        $update_project->location = $request->location;
        $update_project->created_by = $request->created_by;
        $update_project->update();

        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_project = projects::find($id);
        $delete_project->delete();
        return response()->json([], 200);
    }



}
