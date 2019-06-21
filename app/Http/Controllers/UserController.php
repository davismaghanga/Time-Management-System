<?php

namespace App\Http\Controllers;

use App\Kazi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function allusers()
    {
        return view('users.users') ;
    }

    public function data()
    {
        $users=User::all();
        return view('users.table',compact('users'));
//        return response()->json($users);

    }

    public function viewform()
    {
       return view('users.form');
    }

    public function store(Request $request)
    {
        if($request->has('id') && $request->id!=null){
            $user=User::find($request->id);
            $user->name=$request->name;
            $user->email=$request->email;
            if($request->has('password')){
                $user->password=bcrypt($request->password);
            }
        }
        else{
            $user= new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
        }

        $user->save();
    }

    public function update(User $user)
    {

        Session::flash('_old_input',$user);
        return view('users.form');

    }

    public function viewJobForm()
    {
        return view('users.jobsForm');
    }

    public function storeJob(Request $request)
    {
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


    }

    public function updatejob(Kazi $job)
    {
        Session::flash('_old_input',$job);
        return view('users.jobsForm');

    }

    public function jobData($id)
    {
        $jobs=Kazi::where('user_id',$id)->get();
        return view('users.jobsTable',compact('jobs'));
    }

    public function viewJobs($id)
    {
        $newid=$id;
        return view('users.jobs',compact('newid'));
    }

    public function deleteJob($id)
    {
        $job=Kazi::find($id);
        $job->delete();
    }



    public function deleteUser($id)
    {
        $user=User::find($id);
        $user->delete();
    }

    public function userRecords()
    {
        return view('users.userRecords');
    }

    public function userRecordsData()
    {
        $tasks=Kazi::all();
        return view('users.userRecordTable',compact('tasks'));
    }

    public function deleteTask($id)
    {
        $task=Kazi::find($id);
        $task->delete();

    }

    public function updateTask(Kazi $task)
    {
        Session::flash('_old_input',$task);
        return view('users.jobsForm');
    }
}
