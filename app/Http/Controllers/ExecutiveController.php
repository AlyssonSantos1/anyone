<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function newmember (Request $request){
        $member = $request->input('name');
        $member = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'executive'){

            Member::create([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user                
    
    
            ]);

            return 'The operation are authorized. You are an Executive';
            
        }else{

            return 'No Permission Executive Only';

        } 
        return view('newuser');  

    }

    public function edit (Request $request){
        $member = $request->input('name');
        $member = $request->input('hierarchy');

        if ($member == 'name' &&  $member == 'executive'){

            Member::edit([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user                
    
            ]);

            return 'The Member has been edited';

        }else{

            return 'No Permission to edit, Executive Only';

        }          
        
        return view('editmember');
    }

    public function newproject (Request $request){
        $project = $request->input('name');
        $project = $request->input('hierarchy');

        if ($project == 'name' &&  $project == 'executive'){
            Project::create([
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



    public function vision (Request $request){
        $member = $request->input('name');
        $member = $request->input('hierarchy');

        if ($member == 'name' && $member == 'hierarchy'){
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