<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

use DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term_id = $request->term_id ? $request->term_id : 0;
        $sy = $request->sy ? $request->sy : 0;
        $student_id = $request->student_id ? $request->student_id : 0;

        if ($student_id && $term_id && $sy) {
            $grades = Grade::select('grades.grade', 'grading_periods.name as grading_period', 
                'subjects.name as subject')
                ->leftJoin('class_lists', 'class_lists.id', '=', 'grades.class_list_id')
                ->leftJoin('subjects', 'subjects.id', '=', 'class_lists.subject_id')
                ->leftJoin('grading_periods', 'grading_periods.id', '=', 'grades.grading_period_id')
                ->where('class_lists.term_id', $term_id)
                ->where('class_lists.sy', $sy)
                ->where('grades.student_id', $student_id)
                ->get();

                return response(['success' => true, 'data' => $grades]);
        }

        return response(['success' => false, 'data' => []]);
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
        $grade = new Grade;

        $student_id = $request->input('student_id');
        $class_list_id = $request->input('class_list_id');
        $grading_period_id = $request->input('grading_period_id');
        $grades = $request->input('grade');

        $grade->student_id = $student_id;
        $grade->class_list_id = $class_list_id;
        $grade->grade = $grades;

        if ($grade->save()) {
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
        $grade = Grade::findOrFail($id);
        
        $student_id = $request->input('student_id');
        $class_list_id = $request->input('class_list_id');
        $grades = $request->input('grade');

        $grade->student_id = $student_id;
        $grade->class_list_id = $class_list_id;
        $grade->grade = $grades;

        if ($grade->save()) {
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
        $deleted = DB::table('grades')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
