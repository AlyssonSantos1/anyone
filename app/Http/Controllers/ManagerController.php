<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Squad;
use App\Models\Project;



class ManagerController extends Controller

{
    public function index()
    {
        return view('Managers.index');
    }

    
    public function trading (Request $request){

        $user = auth()->user();

        if ($user->hierarchy !== 'manager') {
            return 'You are not a manager to make this trade';

        }

        $project = Project::find($request->project_id);
        if (!$project){
            return 'project not found';
        }


        $projectMember = $project->members()->where('member_id', $user->id)->first();

        if ($projectMember && $projectMember->pivot->role === 'internaladvisor') {
            return 'You are a new Internal Advisor in this project'; 
        }

        $project->members()->attach($user->id, ['role' => 'internaladvisor']);

        return 'Manager now are turned as an Internal Advisor in these Project Temporarily';


    }

    

    public function traded(Request $request){

        $user = auth()->user();

        if (!$user || $user->hierarchy !== 'manager') {
            return 'You are not authorized to make this trade';
        }
       
        $projects = Project::all();

        return view('Managers.Traded.changing', compact('projects'));
    }


    public function catch (Request $request){
       
            $userId = session('user_id');
            
            $member = Member::where('id', $userId)
                    ->where('hierarchy', 'manager') 
                    ->first();
    
            if (!$member) {
                return 'Member Not found or member not an advisor';
            }
    
            $projects = $member->projects;
    
    
            if ($projects->isEmpty()) {
                $projects = collect();
            }
    
            $squads = $member->squad;
    
    
            $reviews = [];  
    
            foreach ($projects as $project) {
                $projectReviews = $project->projectreviews; 
                $membersReviews = $project->members->map(function ($member) {
                    return $member->personalreviews; 
                });

                $personalReviews = $member->personalreviews;
    
                $reviews[] = [
                    'project' => $project,
                    'projectReviews' => $projectReviews,
                    'membersReviews' => $membersReviews,
                    'personalReviews' => $personalReviews
                ];
            }
                return view('Managers.Vision.allreviews', compact('reviews'));
    

    }

   

}
