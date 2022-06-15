<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassList;

use DB;

class ClassListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $class_lists = ClassList::select('id', 'subject_id', 'room_id', 'teacher_id', 
        'from', 'to', 'term_id', 'sy')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $class_lists, 'limit' => $limit]);
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
        $class_list = new ClassList;

        $subject_id = $request->input('subject_id');
        $room_id = $request->input('room_id');
        $teacher_id = $request->input('teacher_id');
        $from = $request->input('from');
        $to = $request->input('to');
        $term_id = $request->input('term_id');
        $sy = $request->input('sy');

        $class_list->subject_id = $subject_id;
        $class_list->room_id = $room_id;
        $class_list->teacher_id = $teacher_id;
        $class_list->from = $from;
        $class_list->to = $to;
        $class_list->term_id = $term_id;
        $class_list->sy = $sy;

        if ($class_list->save()) {
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
        $class_list = ClassList::findOrFail($id);
        
        $subject_id = $request->input('subject_id');
        $room_id = $request->input('room_id');
        $teacher_id = $request->input('teacher_id');
        $from = $request->input('from');
        $to = $request->input('to');
        $term_id = $request->input('term_id');
        $sy = $request->input('sy');

        $class_list->subject_id = $subject_id;
        $class_list->room_id = $room_id;
        $class_list->teacher_id = $teacher_id;
        $class_list->from = $from;
        $class_list->to = $to;
        $class_list->term_id = $term_id;
        $class_list->sy = $sy;

        if ($class_list->save()) {
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
        $deleted = DB::table('class_lists')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
