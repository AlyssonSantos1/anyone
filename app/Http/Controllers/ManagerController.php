<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Squad;
use App\Http\Member;


class ManagerController extends Controller

{
    public function swapuser (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager' OR $hierarchy == 'associates'){
            Squad::edit([
                "reviewsofsquad" =>$request->reviewofsquad_squad,
                "projectreviews" =>$request->projectreviews_projects,
                "role" =>$request->role_user
    
            ]);

        return 'The $name are swap of the $hierarchy to temporary internal advisor in the $project';
        
        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('swapadvisors');
        

    }

    public function traded(Request $request, id $id){
        $member = Member::findorFail($id);
        return view('swapmembers', compact('member'));
    }


    public function avaliation (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager'){
            Squad::read([
                "projectreviews" =>$request->projectreviews_project,
                "reviewsofsquad" =>$request->reviewsofsquad_squad,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
            return 'The reviews now can be acess';

        }else{
            return 'Acess Denied, Manager Only Authorized to do';
        }

        return view('seeallreviews');

    }

    public function thanks(){
        return view('seeallreviews');
    }
    
}
