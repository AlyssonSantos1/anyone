<?php


namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;
use Illuminate\Support\Facades\Hash;
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

        $user = auth()->user();

        if ($user->hierarchy !== 'executive') {
            return 'You are not an executive to make this action';

        }
        
        $name = $request->input('name_user');
        $email = $request->input('email_user');
        $password = $request->input('password_user');
        $role = $request->input('role_user');
        $hierarchy = $request->input('hierarchy_user');
        $insertedproject = $request->input('insertedproject_user');
        $personalreviews = $request->input('personalreviews_user');
        $ownerofreview = $request->input('ownerofreview_user');

        if (empty($name) || empty($email) || empty($password) || empty($role) || empty($hierarchy) || empty($insertedproject) || empty($personalreviews) || empty($ownerofreview)) {
            return response()->json(['error' => 'All fields are required.'], 400); 
        }

        if (Member::where('email', $email)->exists()) {
            return response()->json(['error' => 'Email already exists.'], 400);
        }

        if ($password !== $request->input('password_confirmation_user')) {
            return response()->json(['error' => 'Passwords do not match.'], 400);
        }

        Member::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'hierarchy' => $hierarchy,
            'insertedproject' => $insertedproject,
            'personalreviews' => $personalreviews,
            'ownerofreview' => $ownerofreview,                      
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

        $user = auth()->user();

        if ($user->hierarchy !== 'executive') {
            return 'You are not an executive to make this action';

        }
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

        $user = auth()->user();

        if ($user->hierarchy !== 'executive') {
            return 'You are not an executive to make this action';
        }

        $teammanagerId = $request->input('teammanager_team');

        $teammanager = Member::find($teammanagerId);
               
        $teammanager = Member::find($request->teammanager_team);
        if (!$teammanager || strtolower($teammanager->hierarchy) !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }

        $projectname = $request->input('projectname_project');
        $numberofmembers = $request->input('numberofmembers_project');
        $goals = $request->input('goals_project');
        $description = $request->input('description_project');
        $reviews = $request->input('reviews_project');
        $authorreview = $request->input('authorreview_project');
                
        $project = Project::create([
            "projectname" => $projectname,
            "manager" => $teammanager->name,
            "numberofmembers" => $numberofmembers,
            "goals" => $goals,
            "description" => $description,
            "reviews" => $reviews,
            "authorreview" => $authorreview,
            "projectreviews" => $reviews 

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
        $user = auth()->user();

        if ($user->hierarchy !== 'executive') {
            return 'You are not an executive to make this action';

        }

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

        $user = auth()->user();

        if ($user->hierarchy !== 'executive') {
            return 'You are not an executive to make this action';

        }

        $teammanager_id = $request->input('teammanager_team');
        $reviewsofsquad = $request->input('reviewsofsquad_team');

        $teammanager = Member::find($teammanager_id);
        if (!$teammanager || strtolower($teammanager->hierarchy) !== 'manager') {
            return response()->json(['error' => 'The team manager must be a manager.'], 400);
        }
        
        $squad = Squad::create([
            'teammanager'=> $teammanager->name,
            'reviewsofsquad'=>$reviewsofsquad,

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

    
        

        

