<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HigherEducation;

use DB;

class HigherEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $higher_education = new HigherEducation;

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $gender = $request->input('gender');
        $citizenship = $request->input('citizenship');
        $religion = $request->input('religion');
        $civil_status = $request->input('civil_status');
        $birthdate = $request->input('birthdate');
        $birth_place = $request->input('birth_place');
        $contact = $request->input('contact');
        $permanent_address = $request->input('permanent_address');
        $current_address = $request->input('current_address');
        $father_name = $request->input('father_name');
        $mother_name = $request->input('mother_name');
        $status = $request->input('status'); 
        $degree_applications = $request->input('degree_applications'); 
        $highschool_attended = $request->input('highschool_attended'); 
        $school_names = $request->input('school_names'); 
        $grades_submitted = $request->input('grades_submitted'); 
        $enrolled_summer = $request->input('enrolled_summer'); 
        $disciplinary_actions = $request->input('disciplinary_actions');

        $higher_education->lastname = $lastname;
        $higher_education->firstname = $firstname;
        $higher_education->middlename = $middlename;
        $higher_education->gender = $gender;
        $higher_education->citizenship = $citizenship;
        $higher_education->religion = $religion;
        $higher_education->civil_status = $civil_status;
        $higher_education->birthdate = $birthdate;
        $higher_education->birth_place = $birth_place;
        $higher_education->contact = $contact;
        $higher_education->permanent_address = $permanent_address;
        $higher_education->current_address = $current_address;
        $higher_education->father_name = $father_name;
        $higher_education->mother_name = $mother_name;
        $higher_education->status = $status; 
        $higher_education->degree_applications = $degree_applications; 
        $higher_education->highschool_attended = $highschool_attended; 
        $higher_education->school_names = $school_names; 
        $higher_education->grades_submitted = $grades_submitted; 
        $higher_education->enrolled_summer = $enrolled_summer; 
        $higher_education->disciplinary_actions = $disciplinary_actions;

        if ($higher_education->save()) {
            return response(['success' => true, 'id' => $higher_education->id]);
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
        $higher_education = HigherEducation::select('*')
            ->where('id', $id)->get();

        return response(['data' => $higher_education]);
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
        $higher_education = HigherEducation::findOrFail($id);

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $gender = $request->input('gender');
        $citizenship = $request->input('citizenship');
        $religion = $request->input('religion');
        $civil_status = $request->input('civil_status');
        $birthdate = $request->input('birthdate');
        $birth_place = $request->input('birth_place');
        $contact = $request->input('contact');
        $permanent_address = $request->input('permanent_address');
        $current_address = $request->input('current_address');
        $father_name = $request->input('father_name');
        $mother_name = $request->input('mother_name');
        $status = $request->input('status'); 
        $degree_applications = $request->input('degree_applications'); 
        $highschool_attended = $request->input('highschool_attended'); 
        $school_names = $request->input('school_names'); 
        $grades_submitted = $request->input('grades_submitted'); 
        $enrolled_summer = $request->input('enrolled_summer'); 
        $disciplinary_actions = $request->input('disciplinary_actions');

        $higher_education->lastname = $lastname;
        $higher_education->firstname = $firstname;
        $higher_education->middlename = $middlename;
        $higher_education->gender = $gender;
        $higher_education->citizenship = $citizenship;
        $higher_education->religion = $religion;
        $higher_education->civil_status = $civil_status;
        $higher_education->birthdate = $birthdate;
        $higher_education->birth_place = $birth_place;
        $higher_education->contact = $contact;
        $higher_education->permanent_address = $permanent_address;
        $higher_education->current_address = $current_address;
        $higher_education->father_name = $father_name;
        $higher_education->mother_name = $mother_name;
        $higher_education->status = $status; 
        $higher_education->degree_applications = $degree_applications; 
        $higher_education->highschool_attended = $highschool_attended; 
        $higher_education->school_names = $school_names; 
        $higher_education->grades_submitted = $grades_submitted; 
        $higher_education->enrolled_summer = $enrolled_summer; 
        $higher_education->disciplinary_actions = $disciplinary_actions;

        if ($higher_education->save()) {
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
        
        $deleted = DB::table('higher_education')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
