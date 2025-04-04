<?php


namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;
use Illuminate\Http\Request;



class ExecutiveController extends Controller
{
    public function index()
    {
        return view('Executive.index');
    }
    public function create (Request $request)      
    {
        return view('Executive.Newusercompany.newuser');
    }
    
    public function store (Request $request){

        $validatedData = $request->validate([
            'name_user' => 'required|string',
            'email_user' => 'required|email|unique:members,email', 
            'password_user' => 'required|string|confirmed|min:8',
            'role_user' => 'required|string',
            'hierarchy_user' => 'required|string', 
            'insertedproject_user' => 'required|string',
            'personalreviews_user' => 'required|string', 
            'ownerofreview_user' => 'required|string', 
        ]);

            Member::create([
                'name' => $validatedData['name_user'], 
                'email' => $validatedData['email_user'],
                'password' => Hash::make($validatedData['password_user']), 
                'role' => $validatedData['role_user'], 
                'hierarchy' => $validatedData['hierarchy_user'], 
                'insertedproject' => $validatedData['insertedproject_user'], 
                'personalreviews' => $validatedData['personalreviews_user'], 
                'ownerofreview' => $validatedData['ownerofreview_user'], 
                        
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
        $managers = Member::whereRaw('LOWER(hierarchy) = ?', ['manager'])->get();
        $associates = Member::whereRaw('LOWER(hierarchy) = ?', ['associate'])->get();
        $internaladvisors = Member::whereRaw('LOWER(hierarchy) = ?', ['internaladvisor'])->get();
        return view('Executive.BuildNewProjects.newproject', compact('managers', 'associates', 'internaladvisors'));
       }
    }

    public function congrats (Request $request){ 
       
        $teammanager = Member::find($request->teammanager_team);
        if (!$teammanager || strtolower($teammanager->hierarchy) !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }
        
        $validatedData = $request->validate([
            'projectname_project' => 'required|string', 
            'manager_project' => 'required|string',  
            'numberofmembers_project' => 'required|integer', 
            'goals_project' => 'required|string',  
            'description_project' => 'required|string', 
            'reviews_project' => 'required|string', 
            'authorreview_project' => 'required|string', 
        ]);

        
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

        $internaladvisor = Member::whereRaw('LOWER(hierarchy) = ?', ['internaladvisor'])->first();
        if ($internaladvisor) {
            $project->members()->attach($internaladvisor->id, ['role' => 'internaladvisor']);
        }
       
        $associates = Member::whereRaw('LOWER(hierarchy) = ?', ['associate'])->get();
    
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
        if (!$teammanager || strtolower($teammanager->hierarchy) !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }
        
        $squad = Squad::create([
            'teammanager'=>$request->teammanager_team,
            'reviewsofsquad'=>$request->reviewsofsquad_team,

        ]);  

        $squad->members()->attach($teammanager->member_id, ['role' => 'manager']);
       
        $associates = Member::whereRaw('LOWER(hierarchy) = ?', ['associate'])->get(); 
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

        $managers = Member::whereRaw('LOWER(hierarchy) = ?', ['manager'])->get();
        $associates = Member::whereRaw('LOWER(hierarchy) = ?', ['associate'])->get();
        $projectnames = Project::pluck('projectname');

        return view('Executive.BuildTeams.build', compact('associates', 'managers', 'projectnames'));
    }
}

    
        

        

