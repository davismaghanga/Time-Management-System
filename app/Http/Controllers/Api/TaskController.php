<?php

namespace App\Http\Controllers\Api;

use App\Kazi;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {

        if(Auth::user()->hasRole('user|superadministrator')){
            if($request->has('id') && $request->id != null)
            {
                $job=Kazi::find($request->id);
                $job->workDone=$request->workDone;
                $job->date=$request->date;
                $job->duration=$request->duration;
                $job->user_id=Auth::id();
            }
            else
            {
                $job=new Kazi();
                $job->workDone=$request->workDone;
                $job->date=$request->date;
                $job->duration=$request->duration;
                $job->user_id=Auth::id();

            }
            $job->save();
            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>false]);
        }



    }

    public function deleteTask($id)
    {

        if(Auth::user()->hasRole('user|superadministator')){
            $job=Kazi::find($id);
            $job->delete();
            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>false]);

        }

    }

    public function updateTask(Request $request,$id)
    {
        if(Auth::user()->hasRole('user|superadministator')) {

            $task=Kazi::find($id);
            $task->workDone=$request->workDone;
            $task->date=$request->date;
            $task->duration=$request->duration;
            $task->user_id=Auth::id();
            $task->save();
            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>false]);

        }

    }

    public function viewMyTasks($id)
    {
        $tasks=Kazi::where('user_id',$id)->get()    ;
        return response()->json($tasks);
    }




}
