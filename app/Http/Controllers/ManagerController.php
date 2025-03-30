<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Squad;
use App\Models\Project;



class ManagerController extends Controller

{
    public function trading (Request $request){

        $project = Project::find($request->project_id);
        if (!$project){
            return 'project not found';
        }

        $manager = Member::where('hierarchy', 'manager')->first();
        if (!$manager) {
            return 'Manager not Found';
        }

        $projectMember = $project->members()->where('member_id', $manager->id)->first();
        if ($projectMember){
            return 'The Manager is not associate with this project';
        }

        $project->members()->updateExistingPivot($manager->id, ['role' => 'internaladvisor']);

        return 'Manager now are turned as an Internal Advisor on this Project';

    }

    

    public function traded(Request $request){

        $manager = Member::where('hierarchy', 'manager')->first();
        if (!$manager || $manager->hierarchy !== 'manager') {
            return 'You are not authorized to make this';
        }
        $projects = project::all();
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
