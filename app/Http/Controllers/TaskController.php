<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $tasks=Task::where('property_id',$property->id)->get();
        return view('tasks', compact('tasks','property'));        
    } 
}
