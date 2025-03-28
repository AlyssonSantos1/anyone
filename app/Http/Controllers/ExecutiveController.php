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

    public function edition (Request $request)
    {
        $members = Member::all();

        $member = null;
        if ($request->has('id') && $request->id){

            $member = Member::findorFail($request->id);
           
        }
        return view('Executive.EditMembers.changeduser', compact('members','member'));  
    }         
    

    public function changed(Request $request){
            $member = Member::findorFail($request->id);
            $member->update([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user,            
    
            ]);
        
            return 'The Member has been edited';

    }

    public function newproject (Request $request){
       {
        $managers = Member::where('hierarchy', 'manager')->get();
        $associates = Member::where('hierarchy', 'associate')->get();
        return view('Executive.BuildNewProjects.newproject', compact('managers', 'associates'));
       }
    }

    public function congrats (Request $request){ 
       
        $teammanager = Member::find($request->teammanager_team);
        if (!$teammanager || $teammanager->hierarchy !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }
        

        
        $project = Project::create([
            "projectname" =>$request->projectname_project,
            "manager" =>$request->manager_project,
            "numberofmembers" =>$request->numberofmembers_project,
            "goals" =>$request->goals_project,
            "description" =>$request->description_project,
            "reviews" =>$request->reviews_project,
            "authorreview" =>$request->authorreview_project

        ]);

        $project->members()->attach($teammanager->id, ['role' => 'manager']);
       
        $associates = Member::where('hierarchy', 'associate')->get();
    
        foreach ($associates as $member) {
            $project->members()->attach($member->id, ['role' => 'associate']);
        }


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

        $validated = $request->validate([
            'teammanager_team' => 'required|exists:members,id', 
            'reviewsofsquad_team' => 'required|string',
            'members' => 'required|array',
            'members.*' => 'exists:members,id',
            'projectnames' => 'required|array', 
            'projectnames.*' => 'exists:projects,projectname', 
        ]);

        $teammanager = Member::find($request->teammanager_team);
        if (!$teammanager || $teammanager->hierarchy !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }
        
        $squad = Squad::create([
            'teammanager'=>$request->teammanager_team,
            'reviewsofsquad'=>$request->reviewsofsquad_team,

        ]);  

        $squad->members()->attach($teammanager->member_id, ['role' => 'manager']);
       
        $associates = Member::where('hierarchy', 'associate')->get();    
        foreach ($associates as $member) {
            $squad->members()->attach($member->member_id, ['role' => 'associate']);
        }

        $projectnames = $request->projectnames;
        foreach ($projectnames as $projectname) {
            $project = Project::where('projectname', $projectname)->first(); 
            if ($project) {
                $squad->projects()->attach($project->id);
            }
                foreach ($squad->members as $member) {
                    $project->members()->attach($member->id, ['role' => 'associate']); 
                }
        }
        
            return 'The Squad are Created';
    }
    

    public function tower (Request $request){

        $managers = Member::where('hierarchy', 'manager')->get();
        $associates = Member::where('hierarchy', 'associate')->get();
        $projectnames = Project::pluck('projectname');

        return view('Executive.BuildTeams.build', compact('associates', 'managers', 'projectnames'));
    }
}

    
        

        

