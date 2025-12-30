<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    //
    public function index(){

    // lecture de la liste de tache
    // debug model
    // dd($tasks) ;

        return Task::all()->toResourceCollection();
    }

    // créer un nouveau post
    public function store(Request $request) : JsonResponse
    {
        
    }
}
