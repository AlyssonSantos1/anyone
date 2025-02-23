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


    public function newest (Request $request, int $id){ 
        $project = Project::find($id);
        
        if ($project) {
            $project->update([
                "reviews" =>$request->reviews_project
            ]);
            
        }

        
        return 'The Review is Writed';

    }


    


    public function pyramids (Request $request, int $id){
        $project = Project::find($id);
        
            Project::find([
                "reviews" =>$request->reviews_project
            ]);
            
        }
        

        public function target(int $id)
        {
            $project = Project::find($id);

            if ($project){
                return view('InternalAdvisors.seereviews.projectreview', compact('project'));
            }
            return 'Project not found';
        }
        
}


    


