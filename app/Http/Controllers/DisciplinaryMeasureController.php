<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisciplinaryMeasure;

use DB;

class DisciplinaryMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $disciplinary_measures = DisciplinaryMeasure::select('id', 'name', 'code', 'description')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $disciplinary_measures, 'limit' => $limit]);
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
        $disciplinary_measure = new DisciplinaryMeasure;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');

        $disciplinary_measure->name = $name;
        $disciplinary_measure->code = $code;
        $disciplinary_measure->description = $description;

        if ($disciplinary_measure->save()) {
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
        $disciplinary_measure = DisciplinaryMeasure::findOrFail($id);
        
        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');

        $disciplinary_measure->name = $name;
        $disciplinary_measure->code = $code;
        $disciplinary_measure->description = $description;

        if ($disciplinary_measure->save()) {
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
        $deleted = DB::table('disciplinary_measures')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
