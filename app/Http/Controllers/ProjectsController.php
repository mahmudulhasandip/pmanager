<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('projects.index', ['projects'=>$projects]);
    }

    public function adduser(Request $request) {
        // add user to projects
        $project = Project::find($request->input('project_id'));
        if(Auth::user()->id == $project->user_id) {
            $user = User::where('email', $request->input('email'))->first();
            if(!$user) {
                return redirect()->route('projects.show', ['project' => $project->id])->with('errors', $request->input('email').' user not exist');
            }
            if($user){
                $projectUser = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->first();
                if(!$projectUser){
                    if($user && $project) {
                        $project->users()->attach($user->id);
                        return redirect()->route('projects.show', ['project' => $project->id])->with('success', $request->input('email').' was successfully added to the project!!');
                    }
                }
            }
        }
        return redirect()->route('projects.show', ['project' => $project->id])->with('errors', $request->input('email').' already exist');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = NULL)
    {
        //
        $companies = NULL;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        //
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if($project){
                return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'New project successfully created!!');
            }
        }

        // redirect
        return back()->withInput()->with('errors', 'Project create failed.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project'=>$project, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Company $company)
    {
        //
        $project = Project::find($project->id);
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // save data
        $projectUpdate = Project::find($project->id)->update(['name'=>$request->input('name'), 'description'=> $request->input('description')]);

        if($projectUpdate){
            return redirect()->route('projects.show', ['project'=> $project->id])->with('success','Project update successfully.');
        }

        // redirect
        return back()->withInput()->with('errors', 'Project update failed.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $findProject = Project::find($project->id);

        if($findProject->delete()){
            // redirect
            return redirect()->route('projects.index')->with('success', 'Project has successfully deleted!!');
        }


        return back()->withInput()->with('errors', 'Project delete failed.');


    }


}
