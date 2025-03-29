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
            return 'Manager';
        }

        $projectMember = $project->members()->where('member_id', $manager->id)->first();
        if ($projectMember){
            return 'The Manager is not associate with this project';
        }

        $project->members()->updateExistingPivot($manager->id, ['role' => 'internaladvisor']);

        return 'Manager now are turned as an Internal Advisor on this Project';

    }

    

    public function traded(Request $request){

        $manager = Member::where('id', $id)->where('hierarchy', 'manager')->first();
        if (!$manager || $manager->hierarchy !== 'manager') {
            return 'You are not authorized to make this';
        }
        $projects = project::all();
        return view('Managers.Traded.changing', compact('projects'));
    }


    public function catch (Request $request, int $projectId, int $userId){
        
        $personalReviews = Member::where('id', $userId)->first(['personalreviews']);
        $teamReviews = Squad::where('id', $userId)->first(['reviewsofsquad']);
        $projectReviews = Project::where('id', $projectId)->first(['projectreviews']);


        $personalReviews =  $personalReviews ? $personalReviews->personalreviews : 'No personal Reviews';
        $teamReviews = $teamReviews ? $teamReviews->reviewsofsquad : 'No team Reviews';
        $projectReviews = $projectReviews ? $projectReviews->projectreviews : 'No project reviews';

        return view('Managers.Vision.allreviews',[
           'personalReviews' => $personalReviews,
            'teamReviews' => $teamReviews,
            'projectReviews' => $projectReviews
            
        ]);

    }

   

}
