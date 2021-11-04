<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tasks;
use App\Models\user;
use Auth;

class apitasksController extends Controller
{
    //



    public function store(Request $request){
            // dd($request->all());
        $add_task = new  tasks();
        $add_task->project_id = $request->projectId;
        $add_task->name = $request->addtaskForm['name'];
        $add_task->description =  $request->addtaskForm['description'];
        $add_task->urgency =  $request->addtaskForm['urgency'];
        $add_task->dueDate = $request->addtaskForm['date'];
        $add_task->status = $request->addtaskForm['status'];
        $add_task->created_by =  Auth::user()->first_name . ' ' . Auth::user()->last_name;

        $add_task->save();
        //start Notification



        //End  Notification
        return response()->json([], 200);


    }



    public function update($id,Request $request)
    {
            // dd($request->all());
        $update_task = tasks::find($id);
        $update_task->name = $request->name;
        $update_task->description = $request->description;
        $update_task->dueDate = $request->dueDate;
        $update_task->status = $request->status;
        $update_task->urgency = $request->urgency;
        $update_task->update();

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
        $delete_task = tasks::find($id);
        $delete_task->delete();
        return response()->json([], 200);
    }

}
