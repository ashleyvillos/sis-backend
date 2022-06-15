<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

use DB;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $enrollments = Enrollment::select('enrollments.id', 'enrollments.sy', 'students.firstname', 
            'students.lastname', 'students.middlename', 'terms.name as term', 'courses.name as course')
            ->leftJoin('students', 'enrollments.student_id', '=', 'students.id')
            ->leftJoin('terms', 'enrollments.term_id', '=', 'terms.id')
            ->leftJoin('courses', 'enrollments.course_id', '=', 'courses.id')
            ->orderBy('enrollments.created_at', 'desc')->paginate($limit);

        return response(['data' => $enrollments, 'limit' => $limit]);
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
        $enrollment = new Enrollment;

        $sy = $request->input('sy');
        $term_id = $request->input('term_id');
        $student_id = $request->input('student_id');
        $course_id = $request->input('course_id');

        $enrollment->sy = $sy;
        $enrollment->term_id = $term_id;
        $enrollment->student_id = $student_id;
        $enrollment->course_id = $course_id;

        if ($enrollment->save()) {
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
        $enrollment = Enrollment::findOrFail($id);

        $sy = $request->input('sy');
        $term_id = $request->input('term_id');
        $student_id = $request->input('student_id');
        $course_id = $request->input('course_id');

        $enrollment->sy = $sy;
        $enrollment->term_id = $term_id;
        $enrollment->student_id = $student_id;
        $enrollment->course_id = $course_id;

        if ($enrollment->save()) {
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
        $deleted = DB::table('enrollments')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
