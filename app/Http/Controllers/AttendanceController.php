<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

use DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $attendances = Attendance::select('students.id', 'attendances.login', 'attendances.logout',
            'basic_education.lastname as basic_education_lastname', 'basic_education.firstname as basic_education_firstname',
            'basic_education.middlename as basic_education_middlename', 'basic_education.gender as basic_education_gender',
            'madaris.lastname as madaris_lastname', 'madaris.firstname as madaris_firstname',
            'madaris.middlename as madaris_middlename', 'madaris.gender as madaris_gender',
            'higher_education.lastname as higher_education_lastname', 'higher_education.firstname as higher_education_firstname',
            'higher_education.middlename as higher_education_middlename', 'higher_education.gender as higher_education_gender',
            'techvocs.lastname as techvocs_lastname', 'techvocs.firstname as techvocs_firstname',
            'techvocs.middlename as techvocs_middlename', 'techvocs.gender as techvocs_gender')
            ->leftJoin('students', 'students.id', '=', 'attendances.student_id')
            ->leftJoin('basic_education', 'basic_education.id', '=', 'students.basic_education_id')
            ->leftJoin('madaris', 'madaris.id', '=', 'students.madaris_id')
            ->leftJoin('higher_education', 'higher_education.id', '=', 'students.higher_education_id')
            ->leftJoin('techvocs', 'techvocs.id', '=', 'students.techvoc_id')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $attendances, 'limit' => $limit]);
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
        $student_id = $request->input('student_id');

        $attendance = Attendance::select('*')
            ->where('student_id', $student_id)
            ->whereRaw("DATE(created_at) = CURDATE()")
            ->first();

        if ($attendance) {
            if (!$attendance->logout) {
                $attendance->logout = date("Y-m-d H:i:s");
                if ($attendance->save()) {
                    return response(['success' => true]);
                }
            }
        } else {
            $attendance = new Attendance;

            $login = date("Y-m-d H:i:s");

            $attendance->student_id = $student_id;
            $attendance->login = $login;

            if ($attendance->save()) {
                return response(['success' => true]);
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
        $attendance = Attendance::findOrFail($id);

        $student_id = $request->input('student_id');
        $login = $request->input('login');
        $logout = $request->input('logout');

        $attendance->student_id = $student_id;
        $attendance->login = $login;
        $attendance->logout = $logout;

        if ($attendance->save()) {
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
        $deleted = DB::table('attendances')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
