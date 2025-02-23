<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Squad;
use App\Http\Project;



class ManagerController extends Controller

{
    public function trading (Request $request, int $id){
        $member = Member::findorFail($id);
        $member->update([
           "hierarchy" =>$request->hierarchy_user,
            "insertedproject" =>$request->insertedproject_user,

        ]);

    }

    

    public function traded(Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Managers.Traded.swaprole', compact('member'));
    }


    public function catch (Request $request){
       
        Member::edit([
            "reviews" =>$request->reviews_project,
            "personalreviews" =>$request->personalreviews_personal
            
        ]);

    }

    public function found (Request $request){
        return view('Managers.Vision.allreviews');
    }

    

}
