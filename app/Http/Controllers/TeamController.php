<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function eyes (Request $request){
        $Squad = $request->squad;
        Squad::vision([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);

        return view('New Team has been created');
    }

    public function edit (Request $request){
        $Squad = $request->squad;
        Squad::edit([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user
            

        ]);

        return view('New Team has been changed');
    }
}


