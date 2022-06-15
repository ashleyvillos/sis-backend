<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $basic_education_id = $request->basic_education_id ? $request->basic_education_id : 0;
        $madaris_id = $request->madaris_id ? $request->madaris_id : 0;
        $higher_education_id = $request->higher_education_id ? $request->higher_education_id : 0;
        $techvoc_id = $request->techvoc_id ? $request->techvoc_id : 0;

        $students = [];

        if ($basic_education_id) {
            $students = Student::select('students.id', 'basic_education.firstname', 'basic_education.lastname',
                'basic_education.middlename', 'basic_education.gender')
                ->leftJoin('basic_education', 'students.basic_education_id', '=', 'basic_education.id')
                ->where('students.basic_education_id', '>', 0)
                ->orderBy('lastname')->paginate($limit);
        } else if ($madaris_id) {
            $students = Student::select('students.id', 'students.madaris_id','madaris.firstname', 'madaris.lastname',
                'madaris.middlename', 'madaris.gender')
                ->leftJoin('madaris', 'students.madaris_id', '=', 'madaris.id')
                ->where('students.madaris_id', '>', 0)
                ->orderBy('lastname')->paginate($limit);
        } else if ($higher_education_id) {
            $students = Student::select('students.id', 'higher_education.firstname', 'higher_education.lastname',
                'higher_education.middlename', 'higher_education.gender')
                ->leftJoin('higher_education', 'students.higher_education_id', '=', 'higher_education.id')
                ->where('students.higher_education_id', '>', 0)
                ->orderBy('lastname')->paginate($limit);
        } else if ($techvoc_id) {
            $students = Student::select('students.id', 'students.techvoc_id', 'techvocs.firstname', 'techvocs.lastname',
                'techvocs.middlename', 'techvocs.gender')
                ->leftJoin('techvocs', 'students.techvoc_id', '=', 'techvocs.id')
                // ->where('students.techvoc_id', '>', $techvoc_id)
                ->where('students.techvoc_id', '>', 0)
                ->orderBy('lastname')->paginate($limit);
        }

        return response(['data' => $students, 'limit' => $limit]);
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
        $student = new Student;

        $basic_education_id = $request->input('basic_education_id');
        $madaris_id = $request->input('madaris_id');
        $higher_education_id = $request->input('higher_education_id');
        $techvoc_id = $request->input('techvoc_id');

        $student->basic_education_id = $basic_education_id;
        $student->madaris_id = $madaris_id;
        $student->higher_education_id = $higher_education_id;
        $student->techvoc_id = $techvoc_id;

        if ($student->save()) {
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
        $student = Student::findOrFail($id);

        $basic_education_id = $request->input('basic_education_id');
        $madaris_id = $request->input('madaris_id');
        $higher_education_id = $request->input('higher_education_id');
        $techvoc_id = $request->input('techvoc_id');

        $student->basic_education_id = $basic_education_id;
        $student->madaris_id = $madaris_id;
        $student->higher_education_id = $higher_education_id;
        $student->techvoc_id = $techvoc_id;

        if ($student->save()) {
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
        $deleted = DB::table('students')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
