<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function newmember (Request $request){
        $Squad = $request->squad;
        Squad::create([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);
        //This function is add new users

        return view('New member has been increase');
    }

    public function edit (Request $request, id $id){
        $Squad = $request->squad;
        Squad::edit([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user
            

        ]);
        //This function is edit the users of the company
        return view('the member has been edited');
    }

    public function newproject (Request $request){
        $Squad = $request->squad;
        Squad::create([
            "projectname" =>$request->project_team,
            "managername" =>$request->managername_team,
            "numberofmembers" =>$request->numberofmembers_team,
            "goals" =>$request->goals_team,
            "description" =>$request->description_team,
            "reviews" =>$request->reviews_team

        ]);
        //This function create new projects 

        return view('New Project has been created');
    
    }

    public function swapuser (Request $request, id $id, currentproject $currentproject){
        $Squad = $request->squad;
        Squad::swapuser([
            "name" =>$request->name_user,
            "currentproject" =>$request->currentproject_user

        ]);
        //This function is swap members among the projects 

        return view('The User has been swaped team or role temporary');
    
    }

    public function excludereview (Request $request){
        $Squad = $request->squad;
        Squad::delete([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);

        return view('The Review Has been excluded');
    
    }

    public function vision (Request $request){
        $Squad = $request->squad;
        Squad::read([
            "projectname" =>$request->projectname_user,
            "reviews" =>$request->currentproject_user

        ]);
        //Function can executive to see the review's name author.
        return view('The Manager are see the reviews ');
    
    }

    // public function acess (Request $request, id $id, hierarchy $hierarchy){
    //     $Squad = $request->squad;
    //     Squad::create([
    //         "name" =>$request->name_user,
    //         "email" =>$request->email_user,
    //         "role" =>$request->role_user,
    //         "hierarchy" =>$request->hierarchy_user,
    //         "currentproject" =>$request->currentproject_user

    //     ]);
    //     //Function can permit the managers to acess the themselves reviews

    //     return view('The manager now has acess to reviews of project and themselves');
    // }

    public function review (Request $request){
        $Squad = $request->squad;
        Squad::create([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);

        return view('The manager now can see the review author name');
    }


}
