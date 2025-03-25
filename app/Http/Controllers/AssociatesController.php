<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;



class AssociatesController extends Controller
{
    public function swapuser (Request $request, int $id){
        $member =  Member::findorFail($id);     

        $hierarchy = $request->input('hierarchy_user') ?: null;

            $member->update([
                "name" =>$request->name_user,
                "hierarchy" =>$request->hierarchy_user,
    
            ]);
        
        return 'The member are swap of the hierarchy to temporary internal advisor in the project';
        
    }

    public function map (Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Associates.TradeMembers.swap', compact('member'));
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
