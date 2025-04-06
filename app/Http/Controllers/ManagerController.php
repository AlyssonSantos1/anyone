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
       
            $user = auth()->user();
            
            if (!$user || $user->hierarchy !== 'manager'){
                return 'Member not found or member not an manager';
            }

            $projects = $user->projects;
            $squads = $user->squads;

            if ($projects->isEmpty() && $squads->isEmpty()) {
                return 'You are not inside any project or squad';
            }    
    
            $reviews = [];  
    
            foreach ($projects as $project) {
                $projectReviews = $project->projectreviews; 
                $membersReviews = $project->members->map(function ($member) {
                    return $member->personalreviews; 
                });

                $personalReviews = $project->members->map(function($member) use($user) {
                    if ($member->id == $user->id ){
                        return $member->personalreviews;
                    }
                });
    
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
