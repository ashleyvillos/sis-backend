<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\StudentClass;

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
            $grades = StudentClass::select('grades.grade', 'grading_periods.name as grading_period', 
                'subjects.name as subject')
                ->leftJoin('class_lists', 'class_lists.id', '=', 'student_classes.class_list_id')
                ->leftJoin('grades', 'grades.class_list_id', '=', 'class_lists.id')
                ->leftJoin('subjects', 'subjects.id', '=', 'class_lists.subject_id')
                ->leftJoin('grading_periods', 'grading_periods.id', '=', 'grades.grading_period_id')
                ->where('class_lists.term_id', $term_id)
                ->where('class_lists.sy', $sy)
                ->where('student_classes.student_id', $student_id)
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
        $grade->grading_period_id = $grading_period_id;
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
        $tor = Grade::select('subjects.name', 'subjects.code', 'subjects.units', 'grades.grade',
            'class_lists.sy', 'class_lists.term_id', 'terms.name as term')
            ->leftJoin('class_lists', 'class_lists.id', '=', 'grades.class_list_id')
            ->leftJoin('grading_periods', 'grading_periods.id', '=', 'grades.grading_period_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'class_lists.subject_id')
            ->leftJoin('terms', 'terms.id', '=', 'class_lists.term_id')
            ->where('grades.student_id', $id)
            ->get();

        $data = [];

        if (count($tor)) {
            foreach ($tor as $val) {
                if (!array_key_exists($val->sy, $data)) {
                    $data[$val->sy] = [];
                }
                
                if (!array_key_exists($val->term, $data[$val->sy])) {
                    $data[$val->sy][$val->term] = [];
                }

                if (!array_key_exists($val->name, $data[$val->sy][$val->term])) {
                    $data[$val->sy][$val->term][$val->name] = [
                        'code' => $val->code,
                        'units' => $val->units,
                        'grade' => 0,
                        'divide' => 0
                    ];
                }

                $data[$val->sy][$val->term][$val->name]['grade'] += $val->grade;
                $data[$val->sy][$val->term][$val->name]['divide']++;
            }
        }

        return response(['success' => true, 'data' => $data]);
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
        $grading_period_id = $request->input('grading_period_id');
        $grades = $request->input('grade');

        $grade->student_id = $student_id;
        $grade->class_list_id = $class_list_id;
        $grade->grading_period_id = $grading_period_id;
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
