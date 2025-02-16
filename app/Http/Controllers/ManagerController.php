<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Member;
use App\Http\Squad;
use App\Http\Project;



class ManagerController extends Controller

{
    public function swapuser (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'manager'){
            Member::edit([

                "hierarchy" =>$request->hierarchy_user,
                "role" =>$request->role_user,
                "insertedproject" =>$request->insertedproject_user,
    
            ]);

        
            return 'The Manager or Associate turn to temporary internal advisor in the project';
        
        } else {

            return 'The Swap are not auhorized';

        }
    }

    }

    

    public function traded(Request $request, id $id){
        $member = Member::findorFail($id);
        return view('swapmembers', compact('member'));
    }


    public function avaliation (Request $request){
        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'manager'){
            Squad::read([
                "projectreviews" =>$request->projectreviews_project,
                "reviewsofsquad" =>$request->reviewsofsquad_squad,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
            return 'The reviews now can be acess';

        } else {

            return 'Acess Denied, Manager Only Authorized to do';
        }

    }

    }

    public function thanks(){
        return view('seeallreviews');
    }
    
}
