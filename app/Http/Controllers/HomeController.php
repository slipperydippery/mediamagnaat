<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::check() ){
            $projects = Auth::user()->projects()->with('entrypoint.publication.publicationable', 'publications.publicationable')->get();
            $slugs = Project::select('slug')->get();
            return view('dashboard', compact('projects', 'slugs'));
        }
        return view('welcome');
    }
}
