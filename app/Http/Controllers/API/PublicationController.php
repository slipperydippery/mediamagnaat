<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Project;
use App\Publication;
use App\Video;
use Illuminate\Http\Request;

class PublicationController extends Controller
{

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
        $publicationinput = json_decode($request->publication);
        $file = $request->file('file');

        $project = Project::find( $publicationinput->project_id );

        $video = Video::registerFile($file);

        $video->publication()->create([
            'title'                     => $publicationinput->title,
            'description'               => $publicationinput->description,
            'project_id'                => $project->id,
            'publication_id'            => $publicationinput->publication_id,
        ]);


        if( $publicationinput->entrypoint ){
            $project->entrypoint->publication()->associate($video->publication);
            $project->entrypoint->save();
        }

        return $video->publication;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $publication->title = $request->input('publication.title');
        $publication->description = $request->input('publication.description');
        $publication->save();


        $publication->publicationable->link = $request->input('publication.publicationable.link');
        $publication->publicationable->save();


        return $publication;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Publication $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
    }
}
