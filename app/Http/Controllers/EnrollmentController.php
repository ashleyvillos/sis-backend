<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;

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
        $term_id = $request->term_id? $request->term_id : 0;
        $sy = $request->sy? $request->sy : 0;
        $student_id = $request->student_id? $request->student_id : 0;

        $enrollments = Enrollment::select('enrollments.id', 'enrollments.sy', 
            'terms.name as term', 'courses.name as course', 'students.id',
            'basic_education.lastname as basic_education_lastname', 'basic_education.firstname as basic_education_firstname', 
            'basic_education.middlename as basic_education_middlename', 'basic_education.gender as basic_education_gender',
            'madaris.lastname as madaris_lastname', 'madaris.firstname as madaris_firstname', 
            'madaris.middlename as madaris_middlename', 'madaris.gender as madaris_gender',
            'higher_education.lastname as higher_education_lastname', 'higher_education.firstname as higher_education_firstname', 
            'higher_education.middlename as higher_education_middlename', 'higher_education.gender as higher_education_gender',
            'techvocs.lastname as techvocs_lastname', 'techvocs.firstname as techvocs_firstname', 
            'techvocs.middlename as techvocs_middlename', 'techvocs.gender as techvocs_gender'
            )
            ->leftJoin('students', 'enrollments.student_id', '=', 'students.id')
            ->leftJoin('terms', 'enrollments.term_id', '=', 'terms.id')
            ->leftJoin('courses', 'enrollments.course_id', '=', 'courses.id')
            ->leftJoin('basic_education', 'basic_education.id', '=', 'students.basic_education_id')
            ->leftJoin('madaris', 'madaris.id', '=', 'students.madaris_id')
            ->leftJoin('higher_education', 'higher_education.id', '=', 'students.higher_education_id')
            ->leftJoin('techvocs', 'techvocs.id', '=', 'students.techvoc_id');

        if ($term_id > 0 && $student_id > 0) {
            if ($sy > 0) {
                $enrollments = $enrollments->where('terms.id', $term_id)
                    ->where('enrollments.sy', $sy)
                    ->where('enrollments.student_id', $student_id);
                    
            } else {
                $enrollments = $enrollments->where('terms.id', $term_id)
                    ->whereRaw('enrollments.sy = YEAR(NOW())')
                    ->where('enrollments.student_id', $student_id);
            }
        }

        $enrollments = $enrollments->orderBy('enrollments.created_at', 'desc')->paginate($limit);

        // $enrollments = Student::select('students.id', 
        //     'basic_education.lastname as basic_education_lastname', 'basic_education.firstname as basic_education_firstname', 
        //     'basic_education.middlename as basic_education_middlename', 'basic_education.gender as basic_education_gender',
        //     'madaris.lastname as madaris_lastname', 'madaris.firstname as madaris_firstname', 
        //     'madaris.middlename as madaris_middlename', 'madaris.gender as madaris_gender',
        //     'higher_education.lastname as higher_education_lastname', 'higher_education.firstname as higher_education_firstname', 
        //     'higher_education.middlename as higher_education_middlename', 'higher_education.gender as higher_education_gender',
        //     'techvocs.lastname as techvocs_lastname', 'techvocs.firstname as techvocs_firstname', 
        //     'techvocs.middlename as techvocs_middlename', 'techvocs.gender as techvocs_gender')
        //     ->leftJoin('basic_education', 'basic_education.id', '=', 'students.basic_education_id')
        //     ->leftJoin('madaris', 'madaris.id', '=', 'students.madaris_id')
        //     ->leftJoin('higher_education', 'higher_education.id', '=', 'students.higher_education_id')
        //     ->leftJoin('techvocs', 'techvocs.id', '=', 'students.techvoc_id')
        //     ->where('students.id', 1)
        //     ->get();

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
            return response(['success' => true, 'id' => $enrollment->id]);
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
