<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProjects(){

        $projects = Project::all();
        return view('projects', compact('projects'));
    }
}