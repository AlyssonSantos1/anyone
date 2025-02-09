<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function avaliation (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager'){
            Squad::read([
                "name" =>$request->name_user,
                "projectreviews" =>$request->projectreviews_project,
                "reviewsofsquad" =>$request->reviewsofsquad_squad,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
            return 'The reviews now can be acess';

        }else{
            return 'Acess Denied, Manager Only Authorized to do';
        }

        return view('associates');


    }
}
