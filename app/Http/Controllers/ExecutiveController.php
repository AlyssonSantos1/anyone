<?php

namespace App\Http\Controllers;
use App\Models\Member;

use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function newmember (Request $request)      
    {
        return view('Executive.Newusercompany.newuser');

    }


    
    public function sucess (Request $request){


        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;
            

            
            if ($hierarchy_user === 'executive'){
            

            Member::create([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user                
                
    
            ]);
           
        }
            return 'The user is created!';
            
        } else {

            return 'No Permission. Executive Only';
        }

        //create finish here

        
    }

    public function edition (Request $request, int $id){
        {
        $member = Member::findorFail($id);
        return view('Executive.EditMembers.editmember');     
        } 
      
    }
        
    

    public function changed(Request $request, int $id){

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'executive'){

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
    }        
    }

    public function newproject (Request $request)
       {
        $squads = Squadall();
        return view('Executive.BuildNewProjects.newproject', compact('squads'));
       }
    

    public function congrats (Request $request){

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;           

            
            if ($hierarchy_user === 'executive'){
            
            Project::create([
                "projectname" =>$request->projectname_project,
                "managername" =>$request->managername_project,
                "numberofmembers" =>$request->numberofmembers_project,
                "goals" =>$request->goals_project,
                "description" =>$request->description_project,
                "reviews" =>$request->reviews_project
    
            ]);  
        }
            
            return 'The Project has been created';
        
        } else {

            return 'Acess Denied, Executive Only';
            
        }  

        
    }



    public function vision (Request $request){

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;
            

            
            if ($hierarchy_user === 'executive'){
            
            Squad::read([
                
                "nameofwriterreview" =>$request->nameofwriterreview_project,
                "ownerofreview" =>$request->ownerofreview_project,
                "authorreview" =>$request->authorreview_project
                
    
            ]);

            return "The views now can be viewed";

        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('allreviews');   
        }

    }

    
        

        

}