<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Member;
use App\Models\Squad;





class AdvisorController extends Controller
{

    public function newreview (int $id)
    {
        $project = Project::find($id);

        if ($project){
            return view('InternalAdvisors.WriteReview.givereviews', compact('project'));
        }
       return 'Project not found';
    }


    public function newest (Request $request){ 
        $project = Project::find($request->project_id);
        
        if ($project) {
            $project->update([
                "reviews" =>$request->reviews_project
            ]);
            
        }

        
        return 'The Review is Writed';

    }


    


    public function pyramids (Request $request){

            Squad::read([
                
                "projectreviews" =>$request->projectreviews_project
    
            ]);
        
            return 'See the Review of Project';
            
        
        }
        

        public function target(Request $request)
        {
            return view('InternalAdvisors.seereviews.projectreview');
        }
        
}


    


