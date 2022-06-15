<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $subjects = Subject::select('id', 'name', 'code', 'description', 'cost')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $subjects, 'limit' => $limit]);
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
        $subject = new Subject;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $cost = $request->input('cost');

        $subject->name = $name;
        $subject->code = $code;
        $subject->description = $description;
        $subject->cost = $cost;

        if ($subject->save()) {
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
        $subject = Subject::findOrFail($id);
        
        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $cost = $request->input('cost');

        $subject->name = $name;
        $subject->code = $code;
        $subject->description = $description;
        $subject->cost = $cost;

        if ($subject->save()) {
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
        $deleted = DB::table('subjects')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
