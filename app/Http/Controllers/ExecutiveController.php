<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function newmember (Request $request, hierarchy $hierarchy, id $id){
        $Squad = $request->squad;
        Squad::create([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);
        //This function is add new users
        // adicionar novos usuarios a empresa e so o executivo pode fazer isso por isso o request
        // aqui vai precisar do if pra saber se a pessoa é um executivo mesma logica if/else
        // se nao a operacao nao pode ser gfeita e mostra uma mensagem "nao autorizado, so executivos" 

        return view('New member has been increase');
    }

    public function edit (Request $request, id $id){
        $Squad = $request->squad;
        Squad::edit([
            "name" =>$request->name_user,
            "email" =>$request->email_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user
            

        ]);
        //This function is edit the users of the company
        // essa funcao serve pra editar dados do usuario na empresa
        // aqui vai precisar do if pra saber se a pessoa é um executivo mesma logica if/else
        // se nao a operacao nao pode ser gfeita e mostra uma mensagem "nao autorizado, so executivos" 
        return view('the member has been edited');
    }

    public function newproject (Request $request, hierarchy $hierarchy, id $id){
        $Squad = $request->squad;
        Squad::create([
            "projectname" =>$request->projectname_project,
            "managername" =>$request->managername_project,
            "numberofmembers" =>$request->numberofmembers_project,
            "goals" =>$request->goals_project,
            "description" =>$request->description_project,
            "reviews" =>$request->reviews_project

        ]);
        //This function create new projects 
        // essa funcao serve pra criar o projeto e so o executivo na hierarquia pode fazer isso por isso a request
        // aqui vai precisar do if pra saber se a pessoa é um executivo mesma logica if/else
        // se nao a operacao nao pode ser gfeita e mostra uma mensagem "nao autorizado, so executivos" 
        return view('New Project has been created');
    
    }

    public function swapuser (Request $request, id $id, hierarchy $hierarchy){
        $Squad = $request->squad;
        Squad::swapuser([
            "name" =>$request->name_user,
            "currentproject" =>$request->currentproject_user,
            "role" =>$request->role_user

        ]);
        //This function is swap members among the projects
        // essa funcao pode trocar as funcoes dos usuarios na empresa ou trocar ele de projetos 
        // aqui vai precisar do if pra saber se a pessoa é um executivo mesma logica if/else
        // se nao a operacao nao pode ser gfeita e mostra uma mensagem "nao autorizado, so executivos" 

        return view('The User has been swaped team or role temporary');
    
    }

    public function excludereview (Request $request, hierarchy $hierarchy, id $id ){
        $Squad = $request->squad;
        Squad::delete([
            "projectname" =>$request->projectname_project,
            "reviews" =>$request->reviews_project,

        ]);

        return view('The Review Has been excluded');
        //funcao que so executivo pode excluir comentarios mas nao podem editar
        // aqui vai precisar do if pra saber se a pessoa é um executivo mesma logica if/else
    
    }

    public function vision (Request $request, id $id, hierarchy $hierarchy){
        $Squad = $request->squad;
        Squad::read([
            "name" =>$request->name_user,
            "reviews" =>$request->currentproject_user

        ]);
        //Function can executive to see the review's name author.
        return view('The Manager are see the reviews ');
    
    }
    //somente executivos podem ver o nome do autor das reviews
    // nessa funcao vai precisar da logica do if (se for o executivo consegue ver/se nao) 
    // "nao autorizado ver author review" nao lembro a estrutura dos if e vou fazer amanha com amente descansada

    

}