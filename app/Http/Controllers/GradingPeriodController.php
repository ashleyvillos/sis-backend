<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradingPeriod;

use DB;

class GradingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $grading_periods = GradingPeriod::select('id', 'name', 'code', 'description')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $grading_periods, 'limit' => $limit]);
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
        $grading_period = new GradingPeriod;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');

        $grading_period->name = $name;
        $grading_period->code = $code;
        $grading_period->description = $description;

        if ($grading_period->save()) {
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
        $grading_period = GradingPeriod::findOrFail($id);

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');

        $grading_period->name = $name;
        $grading_period->code = $code;
        $grading_period->description = $description;

        if ($grading_period->save()) {
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
        $deleted = DB::table('grading_periods')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
