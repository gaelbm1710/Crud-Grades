<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\GradableActivity;

class GradableActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $activities = $subject->gradableActivities;
        return view('gradable_activities.index', compact('subject','activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($subjectId)
    {
        return view ('gradable_activities.create', compact('subjectId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $subjectId)
    {
        $request->validate([
            'tipo'=>'required|string|max:255',
            'grade'=>'nullable|numeric',
            'fecha_actividad'=>'required|date',
            'descripcion'=>'nullable|string'
        ]);
        $activity = new GradableActivity($request->all());
        $activity->subject_id = $subjectId;
        $activity->save();
        return redirect()->route('subjects.gradable_activities.index', $subjectId)->with('success','Gradable Activity created');
    }

    /**
     * Display the specified resource.
     */
    public function show($subjectId, $activityId)
    {
        $subject = Subject::findOrFail($subjectId);
        $activity = GradableActivity::findOrFail($activityId);
        return view('subjects.show', compact('subject', 'activity'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $subjectId)
    {
        $activity = GradableActivity::findOrFail($id);
        return view('gradable_activities.edit', compact('activity','subjectId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $subjectId)
    {
        $request->validate([
            'tipo'=>'required|string|max:255',
            'grade'=>'nullable|numeric',
            'fecha_actividad'=>'required|date',
            'descripcion'=>'nullable|string'
        ]);
        $activity = GradableActivity::findOrFail($id);
        $activity->update($request->all());
        return redirect()->route('subjects.gradable_activities.index', $subjectId)->with('success','Gradable Activity updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $subjectId)
    {
        $activity = GradableActivity::findOrFail($id);
        $activity->delete();
        return redirect()->route('subjects.gradable_activities.index', $subjectId)->with('success','Gradable Activity deleted');
    }
}
