<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers()
    {
        $users=User::all();
        return response()->json($users);
    }

    public function storeUser(Request $request)
    {
        if(Auth::user()->hasRole(['administrator','superadministrator']))
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
            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>'no rights granted  ']);

        }



    }

    public function deleteUser($id)
    {
        if(Auth::user()->hasRole('administrator|superadministrator')) {

            $user=User::find($id);
            $user->delete();
            return response()->json(['success'=>true]);

        }
        else{
            return response()->json(['success'=>false]);

        }

    }

    public function updateUser(Request $request,  $id)
    {

        if(Auth::user()->hasRole('administrator|superadministrator')) {

            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            if($request->has('password')){
                $user->password=bcrypt($request->password);
            }

            $user->save();

            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>false]);

        }

    }

}
