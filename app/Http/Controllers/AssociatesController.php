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

    public function glasses (Request $request){
        $project = Project::find($request->project_id);
        $member = Member::find($request->user_id);

        if (!$project || !$member) {
            return 'User or Project not found';
        }
        
        return view('Associates.ProjectThemselves.associates', [
            'project' => $project,
            'member' => $member
        ]);


       

    }

    

        // $member = Member::find($request->user_id); 
       
        //     Member::find([
        //         "reviews" =>$request->reviews_project,
        //         "personalreviews" =>$request->personalreviews_personal
                
        //     ]);
        // }

    public function swan(Request $request){
        return view('Associates.ProjectThemselves.associates');
    }


}
