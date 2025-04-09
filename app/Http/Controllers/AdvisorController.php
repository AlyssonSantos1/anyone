<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Member;
use App\Models\Squad;





class AdvisorController extends Controller
{
    public function index()
    {
        return view('InternalAdvisors.index');
    }

    public function newreview (Request $request)
    {
        $projects = Project::all();
        return view('InternalAdvisors.WriteReview.givereviews', compact('projects'));
    }


    public function newest (Request $request){ 
        
        $request->validate([
            'projectreviews' => 'required|string|max:800',
             'project_id' => 'required|exists:projects,id'
        ]);
        
        $project = Project::findOrFail($request->project_id);

        $projectReviews = $request->input('projectreviews');
        if ($projectReviews !== null){
            $project->projectreviews = $projectReviews;
            $project->save();
        }

       
        return 'The Review is created!';

    }

    public function target(Request $request)
    {
        $projectId = $request->input('project_id');
        $projects = Project::all();

        if ($projectId) {
            $project = Project::find($projectId);

            if ($project) {
                // Verifica se o projeto tem uma revisão
                $review = $project->projectreviews ?? 'No review found for this project.';
                return view('InternalAdvisors.seereviews.review', [
                    'project' => $project,
                    'review' => $review
                ]);
            } else {
                // Se o projeto não for encontrado, retorna a mensagem de erro
                return view('InternalAdvisors.seereviews.review', [
                    'error' => 'Project not found'
                ]);
            }
        }

        // Caso não tenha project_id, retorna a visão padrão com os projetos
        return view('InternalAdvisors.seereviews.projectreview', compact('projects'));
        }
        
}


    


