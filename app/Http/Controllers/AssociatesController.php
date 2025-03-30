<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;



class AssociatesController extends Controller
{
    public function swapuser (Request $request){

        $project = Project::find($request->project_id);
        if (!$project){
            return 'project not found';
        }

        $associate = Member::where('hierarchy', 'associate')->first();
        if (!$associate) {
            return 'Manager not Found';
        }

        $projectMember = $project->members()->where('member_id', $associate->id)->first();
        if ($projectMember){
            return 'The Associate is not associate with this project';
        }

        $project->members()->updateExistingPivot($associate->id, ['role' => 'internaladvisor']);

        return 'Associate now are turned as an Internal Advisor in these Project';

    
    }

    public function map (Request $request){
        
        $associate = Member::where('hierarchy', 'associate')->first();
        if (!$associate || $associate->hierarchy !== 'associate') {
            return 'You are not authorized to make this trade';
        }
        $projects = project::all();
        return view('Associates.TradeMembers.swap', compact('projects'));
    }
   
    public function swan(Request $request){

        $userId = session('user_id');
        
        $member = Member::where('id', $userId)
                ->where('hierarchy', 'associate') 
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

            $reviews[] = [
                'project' => $project,
                'projectReviews' => $projectReviews,
                'membersReviews' => $membersReviews,
            ];
        }
            return view('Associates.ProjectThemselves.associates', compact('reviews'));
    }


}
