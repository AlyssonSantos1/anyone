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
        

    public function getReviewAuthors(Request $request)
    {
        if (!$request->has('project_id')) {
            
            $projects = Project::all();
            return view('Executive.ProjectReviews.allreviews', compact('projects'));
        }
    
        $projectId =  $request->input('project_id');
        $project = Project::find($projectId);

        if (!$projectId) {
            return 'Project not found'; 
        }

        if ($project->authorreview) {
            return 'Author of the review: ' . $project->authorreview;
        }

        return 'Author not found';
        
    }

    public function construction (Request $request){
        

        $teammanager = Member::find($request->teammanager_team);
        if (!$teammanager || $teammanager->hierarchy !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }

        $members = $request->members; 

        foreach ($members as $memberId) {
            $member = Member::find($memberId);
            if (!$member || $member->hierarchy !== 'associate') {
                return response()->json(['error' => "Member with ID {$memberId} must be an associate."], 400);
            }

        }

        $squad = Squad::create([
            'teammanager'=>$request->teammanager_team,
            'numberofmembers'=>$request->numberofmembers_team,
            'projectfocus'=>$request->projectfocus_team,
            'reviewsofsquad'=>$request->reviewsofsquad_team,

        ]);

        $squad->members()->sync($members);

        return 'The Squad are Created';


    }

    public function tower (Request $request){

        $managers = Member::where('hierarchy', 'manager')->get();
        $associates = Member::where('hierarchy', 'associate')->get();
;
        return view('Executive.BuildTeams.build', compact('managers', 'associates'));
    }
}

    
        

        

