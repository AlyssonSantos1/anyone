<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function newmember (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'executive'){

            Squad::create([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "currentproject" =>$request->currentproject_user
    
            ]);

            return 'The operation is authorized you are an Executive';
            
        }else{

            return 'No Permission Executive Only';

        } 
        return view('newproject');  

    }

    public function edit (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'executive'){

            Squad::edit([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "currentproject" =>$request->currentproject_user
                
    
            ]);

            return 'The Member has been edited';

        }else{

            return 'No Permission to edit, Executive Only';

        }          
        
        return view('editmember');
    }

    public function newproject (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'executive'){
            Squad::create([
                "projectname" =>$request->projectname_project,
                "managername" =>$request->managername_project,
                "numberofmembers" =>$request->numberofmembers_project,
                "goals" =>$request->goals_project,
                "description" =>$request->description_project,
                "reviews" =>$request->reviews_project
    
            ]);  
            
            return 'New Project has been created';
        
    }else{
        return 'Acess Denied, Executive Only';
    }
        return view('newproject');
    
    }

    public function swapuser (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager' OR $hierarchy == 'associates'){
            Squad::edit([
                "name" =>$request->name_user,
                "currentproject" =>$request->currentproject_user,
                "role" =>$request->role_user
    
            ]);

        return 'The $name are swap of the $hierarchy to temporary internal advisor in the $project';
        
        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('swap');
        

    }


    public function vision (Request $request, id $id, hierarchy $hierarchy){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' && $hierarchy == 'hierarchy'){
            Squad::read([
                
                "nameofwriterreview" =>$request->nameofwriterreview_project,
                "ownerofreview" =>$request->ownerofreview_project,
                "authorreview" =>$request->authorreview_project
                
    
            ]);

            return "The views now can be viewed";

        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('sawreview');     

    }
        

        

}