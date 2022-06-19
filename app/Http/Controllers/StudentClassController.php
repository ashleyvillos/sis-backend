<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;

use DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;
        $enrollment_id = $request->enrollment_id ? $request->enrollment_id : 0;

        $student_classes = StudentClass::select('*');

        if ($enrollment_id > 0) {
            $student_classes = $student_classes->where('enrollment_id', $enrollment_id);
        }
        
        $student_classes = $student_classes->orderBy('id')->paginate($limit);

        return response(['data' => $student_classes, 'limit' => $limit]);
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
        // $student_class = new StudentClass;

        // $class_list_id = $request->input('class_list_id');
        // $student_id = $request->input('student_id');

        // $student_class->class_list_id = $class_list_id;
        // $student_class->student_id = $student_id;

        // if ($student_class->save()) {
        //     return response(['success' => true]);
        // }

        $data = $request->data;

        // if ($data)
        if ($data && StudentClass::insert($data)) {
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
        // $student_class = StudentClass::findOrFail($id);
        
        // $class_list_id = $request->input('class_list_id');
        // $student_id = $request->input('student_id');

        // $student_class->class_list_id = $class_list_id;
        // $student_class->student_id = $student_id;

        // if ($student_class->save()) {
        //     return response(['success' => true]);
        // }

        $data = $request->data;

        if ($data) {
            $deleted = StudentClass::where('enrollment_id', $id)->delete();
            if (StudentClass::insert($data)) {
                return response(['success' => true]);
            }
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
        $deleted = DB::table('student_classes')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
