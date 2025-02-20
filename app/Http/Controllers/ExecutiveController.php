<?php


namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;
use Illuminate\Http\Request;



class ExecutiveController extends Controller
{
    public function create (Request $request)      
    {
        return view('Executive.Newusercompany.newuser');
    }
    
    public function store (Request $request){
            Member::create([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user, 
                "squad_id" =>$request->squad_id          
                
    
            ]);
           
    
            return 'The User Has been created';
     
    }

    public function edition (Request $request, int $id){
        {
        $member = Member::findorFail($id);
        return view('Executive.EditMembers.changeduser', compact('member'));     
        } 
      
    }
        
    

    public function changed(Request $request, int $id){
            $member = Member::findorFail($id);
            $member->update([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user,
                "squad_id" =>$request->squad_id              
    
            ]);
        
            return 'The Member has been edited';

        
        
           
    }

    public function newproject (Request $request){
       {
        $project = Project::all();
        return view('Executive.BuildNewProjects.newproject', compact('project'));
       }
    }

    public function congrats (Request $request){            
        $request->validate([
            'projectname_project' => 'required|string',
            'manager_project' => 'required|string',
            'numberofmembers_project' => 'required|string',
            'goals_project' => 'required|string',
            'description_project' => 'required|string',
            'reviews_project' => 'nullable|string',
            'authorreview_project' => 'nullable|string',
        
        ]);


            Project::create([
                "projectname" =>$request->projectname_project,
                "manager" =>$request->manager_project,
                "numberofmembers" =>$request->numberofmembers_project,
                "goals" =>$request->goals_project,
                "description" =>$request->description_project,
                "reviews" =>$request->reviews_project,
                "authorreview" =>$request->authorreview_project
    
            ]);         
            
            return 'The Project has been created';
            
    }

    public function catch (Request $request, int $id){

        Project::find([
            "projectname" =>$request->projectname_project,
                "manager" =>$request->manager_project,
                "numberofmembers" =>$request->numberofmembers_project,
                "goals" =>$request->goals_project,
                "description" =>$request->description_project,
                "reviews" =>$request->reviews_project,
                "authorreview" =>$request->authorreview_project

        ]);
    }

    public function locked (Request $request, int $id){
        return view('Executive.binocular.restrict');
    }
        
       

        
    



    public function vision (Request $request){

    
            Squad::read([
                
                "nameofwriterreview" =>$request->nameofwriterreview_project,
                "ownerofreview" =>$request->ownerofreview_project,
                "authorreview" =>$request->authorreview_project
                
    
            ]);

            return "The views now can be viewed";

    }

    
        

        

}