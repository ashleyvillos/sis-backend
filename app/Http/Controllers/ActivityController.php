<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

use DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $activities = Activity::select('id', 'name', 'code', 'description', 'from', 'to')
            ->orderBy('id', 'desc')->paginate($limit);

        return response(['data' => $activities, 'limit' => $limit]);
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
        $activity = new Activity;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $from = $request->input('from');
        $to = $request->input('to');

        $activity->name = $name;
        $activity->code = $code;
        $activity->description = $description;
        $activity->from = $from;
        $activity->to = $to;

        if ($activity->save()) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $activity = Activity::findOrFail($id);

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $from = $request->input('from');
        $to = $request->input('to');

        $activity->name = $name;
        $activity->code = $code;
        $activity->description = $description;
        $activity->from = $from;
        $activity->to = $to;

        if ($activity->save()) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('activities')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
