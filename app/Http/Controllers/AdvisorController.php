<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Member;
use App\Models\Squad;





class AdvisorController extends Controller
{

    public function newreview ($projectId)
    {
        $project = Project::find($projectId);

        if (!$project){
            return 'Project not Found!';
        }
       return view('InternalAdvisors.WriteReview.givereviews', compact('project'));
    }


    public function newest (Request $request, int $projectId){ 
        
        $request->validate([
            'review' => 'required|string|max:800'
        ]);
        
        $project = Project::find($projectId);

        $existingReviews = $project->projectReviews ?? '';
        $newReview = $existingReviews . "\n" . $request->review;

        $project->projectReviews = $newReview;
        $project->save();

        return 'The Review is Writed';

    }

    public function target(Request $request, int $projectId)
    {
        
        $projectReviews = Project::where('id', $projectId)->first(['projectreviews']);

        $projectReviews = $projectReviews ? $projectReviews->projectreviews : 'No project reviews';

        return view('InternalAdvisors.seereviews.projectreview',[
            'projectReviews' => $projectReviews
            
        ]);

    }
        
}


    


