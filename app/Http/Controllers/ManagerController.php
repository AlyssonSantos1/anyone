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

        return 'The Manager are swap for internal advisor temporary';

    }

    

    public function traded(Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Managers.Traded.changing', compact('member'));
    }


    public function catch (Request $request){
       
        Member::find([
            "reviews" =>$request->reviews_project,
            "personalreviews" =>$request->personalreviews_personal,
            "reviews" =>$request->reviews_project

            
        ]);

    }

    public function found (Request $request){
        return view('Managers.Vision.allreviews');
    }

    

}
