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

        if (!$userId) {
            return 'User not Found';
        }
        
        $manager = Member::findOrFail($userId);

        if ($manager->hierarchy !== 'manager') {
            return 'Manager not Found';
        }

        $projects = $manager->projects;

        $squads = $manager->squads;

        $personalReviews = $manager->personalreviews ?: 'No personal reviews';

        $teamReviews = [];

        foreach ($squads as $squad) {
            $reviews[] = [
                'type' => 'Squad',
                'name' => $squad->name,
                'reviews' => $squadReviews ?: 'No squad reviews'
            ];
        }

        $reviews = [];

        foreach($projects as $project){
            $projectReviews = $project->reviews;
            $reviews[] = [
                'type' => 'project',
                'name' => $project->name,
                'reviews' => $projectReviews ?: 'No project reviews'
            ];
        }
       
        return view('Managers.Vision.allreviews', [
            'reviews' => $reviews,
            'personalReviews' => $personalReviews,
            'teamreviews' => $teamReviews
        ]);

    }

   

}
