<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;



class AssociatesController extends Controller
{
    public function index()
    {
        return view('Associates.index');
    }

    
    public function swapuser (Request $request){

        $user = auth()->user();

        if ($user->hierarchy !== 'associate') {
            return 'You are not an associate to make this trade';

        }

        $project = Project::find($request->project_id);
        if (!$project){
            return 'project not found';
        }


        $projectMember = $project->members()->where('member_id', $user->id)->first();

        if ($projectMember){
            return 'You are an Associate in this project';
        }

        $project->members()->attach($user->id, ['role' => 'internaladvisor']);

        return 'Associate now are turned as an Internal Advisor in these Project Temporarily';

    
    }

    public function map (Request $request){

        $user = auth()->user();

        if (!$user || $user->hierarchy !== 'associate') {
            return 'You are not authorized to make this trade';
        }
       
        $projects = Project::all();

        return view('Associates.TradeMembers.swap', compact('projects'));
    }
   
    public function swan(Request $request){

        $user = auth()->user();

        if (!$user || $user->hierarchy !== 'associate') {
            return 'Member Not found or member not an advisor';
        }
        
        $projects = $user->projects;  
        $squads = $user->squads;


        if ($projects->isEmpty() && $squads->isEmpty()) {
            return 'You are not associated with any projects or squads.';
        }

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

        foreach ($squads as $squad) {
            $squadReview = $squad->reviewsofsquad;
            $membersReviews = $squad->members->map(function($member){
                return $member->personalreviews;
            });

            $revirews[] = [
                'squad' => $squad,
                'squadReview' => $squadReview,
                'membersReviews' => $membersReviews,
            ];
        }
            
    
    return view('Associates.ProjectThemselves.associates', compact('reviews'));

    }
}
