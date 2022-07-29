<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\StudentLog;
use App\Models\StudentLogFile;

use DB;

class StudentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $student_id = $request->student_id;

        $student_logs = [];

        $student_logs = StudentLog::select('student_logs.id', 'student_logs.logged_by', 'student_logs.log_type',
                'student_logs.remarks', 'student_log_files.title', 'student_log_files.filename', 'student_logs.created_at',
                'basic_education.firstname', 'basic_education.lastname', 'basic_education.middlename', 'basic_education.gender', 'basic_education.id as basic_education_id')
                ->leftJoin('students', 'students.id', '=', 'student_logs.student_id')
                ->leftJoin('basic_education', 'students.basic_education_id', '=', 'basic_education.id')
                ->leftJoin('student_log_files', 'student_log_files.student_log_id', '=', 'student_logs.id')
                ->where('student_logs.student_id', '=', $student_id)
                ->orderBy('student_logs.id', 'desc')->paginate($limit);

        return response(['data' => $student_logs, 'limit' => $limit]);
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
        $student_log = new StudentLog;

        $student_id = $request->input('student_id');
        $logged_by = $request->input('logged_by');
        $log_type = $request->input('log_type');
        $remarks = $request->input('remarks');

        $filename = $request->input('filename');
        $title = $request->input('title');

        $student_log->student_id = $student_id;
        $student_log->logged_by = $logged_by;
        $student_log->log_type = $log_type;
        $student_log->remarks = $remarks;

        if ($files = $request->file('file')) {
            if ($student_log->save()) {

                $file = $request->file->store('public/documents');

                //store your file into database
                $student_log_file = new StudentLogFile;
                $student_log_file->title = $title;
                $student_log_file->filename = $file;
                $student_log_file->student_log_id = $student_log->id;

                if ($student_log_file->save()) {
                    return response(['success' => true]);
                }
            }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
