<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ApiTasksControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $id)
    {
        $data=Task::where('property_id',$id)->get();
        $responce['data']=$data;
        $responce['succes']=true;
        return $responce;
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        try{
            $task=new Task();
            $task->name=$request->name;
            $task->date=$request->date;
            $task->description=$request->description;
            $task->property_id=intval($request->property_id);
            $task->save();

            $responce['message']="Save successfull";
            $responce['succes']="true";

        }catch(\Exception $e){
            $responce['message']=$request->name;
            $responce['succes']="false";
        }
        return $responce;
    }
}
