<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Squad;
use App\Models\Project;



class ManagerController extends Controller

{
    public function trading (Request $request, int $id){
        $member = Member::findorFail($id);
        $member->update([
           "hierarchy" =>$request->hierarchy_user,
            "insertedproject" =>$request->insertedproject_user,

        ]);

        return 'The Manager are swap for internal advisor temporary';

    }

    

    public function traded(Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Managers.Traded.changing', compact('member'));
    }


    public function catch (Request $request, int $projectId, int $userId){
        
        $personalReviews = Member::where('id', $userId)->first(['personalreviews']);
        $teamReviews = Squad::where('id', $userId)->first(['reviewsofsquad']);
        $projectReviews = Project::where('id', $projectId)->first(['projectreviews']);


        $personalReviews =  $personalReviews ? $personalReviews->personalreviews : null;
        $teamReviews = $teamReviews ? $teamReviews->teamreviews : null;
        $projectReviews = $projectReviews ? $projectReviews->projectreviews : null;

        return view('Managers.Vision.allreviews',[
           'personalReviews' => $personalReviews,
            'teamReviews' => $teamReviews,
            'projectReviews' => $projectReviews
            
        ]);

    }

   

}
