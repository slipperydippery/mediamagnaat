<?php

namespace App\Http\Controllers\API;

use App\Entrypoint;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        
        $user = auth('api')->user();

        $project = Project::create([
            'title'         => $request->input('project.title'),
            'slug'          => $request->input('project.slug'),
            'description'   => $request->input('project.description'),
            'user_id'       => $user->id,
            'public'        => $request->input('project.public'),
        ]);

        $project->layout()->create(['slug' => $project->slug]);

        $project->entrypoint()->create();

        $project = Project::with('entrypoint')->find($project->id);

        return $project;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
