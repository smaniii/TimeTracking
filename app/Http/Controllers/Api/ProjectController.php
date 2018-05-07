<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $i=0;
        $hoursBilled = 0;
        foreach ($projects as $project){
            $timeLogs = Time::where('project_id',$project->id)->get();
            foreach ($timeLogs as $timeLog){
                $hoursBilled = $hoursBilled + $timeLog->hoursBilled;
            }
            $projects[$i]['billableHours'] = $hoursBilled;
            $hoursBilled = 0;
            $i++;
        }
        return response($projects,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $hoursBilled = 0;
        $timeLogs = Time::where('project_id',$project->id)->get();
            foreach ($timeLogs as $timeLog){
                $hoursBilled = $hoursBilled + $timeLog->hoursBilled;
            }
        $project['billableHours'] = $hoursBilled;
        return response($project,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'cap' => 'required|numeric',
        ])->validate();

        $project = Project::find($id);
        $project->cap = $request->cap;
        $project->save();

        return response("updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
