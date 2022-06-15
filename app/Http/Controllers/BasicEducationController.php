<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicEducation;

use DB;

class BasicEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $basic_education = new BasicEducation;

        $birth_certificate_no = $request->input('birth_certificate_no');
        $learner_reference_number = $request->input('learner_reference_number');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        $ip_community = $request->input('ip_community');
        $mother_tongue = $request->input('mother_tongue');
        $house_no = $request->input('house_no');
        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $city = $request->input('city');
        $municipality = $request->input('municipality');
        $province = $request->input('province');
        $country = $request->input('country');
        $zipcode = $request->input('zipcode');
        $father_lastname = $request->input('father_lastname');
        $father_firstname = $request->input('father_firstname');
        $father_middlename = $request->input('father_middlename');
        $father_mobile = $request->input('father_mobile');
        $father_phone = $request->input('father_phone');
        $mother_lastname = $request->input('mother_lastname');
        $mother_firstname = $request->input('mother_firstname');
        $mother_middlename = $request->input('mother_middlename');
        $mother_mobile = $request->input('mother_mobile');
        $mother_phone = $request->input('mother_phone');
        $guardian_lastname = $request->input('guardian_lastname');
        $guardian_firstname = $request->input('guardian_firstname');
        $guardian_middlename = $request->input('guardian_middlename');
        $guardian_mobile = $request->input('guardian_mobile');
        $guardian_phone = $request->input('guardian_phone');
        $last_grade_level_completed = $request->input('last_grade_level_completed');
        $last_school_year_completed = $request->input('last_school_year_completed');
        $school_name = $request->input('school_name');
        $school_id = $request->input('school_id');
        $school_address = $request->input('school_address');
        $semester = $request->input('semester');
        $track = $request->input('track');
        $strand = $request->input('strand');
        $status = $request->input('status');

        $basic_education->birth_certificate_no = $birth_certificate_no;
        $basic_education->learner_reference_number = $learner_reference_number;
        $basic_education->lastname = $lastname;
        $basic_education->firstname = $firstname;
        $basic_education->middlename = $middlename;
        $basic_education->extension = $extension;
        $basic_education->birthdate = $birthdate;
        $basic_education->gender = $gender;
        $basic_education->ip_community = $ip_community;
        $basic_education->mother_tongue = $mother_tongue;
        $basic_education->house_no = $house_no;
        $basic_education->street = $street;
        $basic_education->baranggay = $baranggay;
        $basic_education->city = $city;
        $basic_education->municipality = $municipality;
        $basic_education->province = $province;
        $basic_education->country = $country;
        $basic_education->zipcode = $zipcode;
        $basic_education->father_lastname = $father_lastname;
        $basic_education->father_firstname = $father_firstname;
        $basic_education->father_middlename = $father_middlename;
        $basic_education->father_mobile = $father_mobile;
        $basic_education->father_phone = $father_phone;
        $basic_education->mother_lastname = $mother_lastname;
        $basic_education->mother_firstname = $mother_firstname;
        $basic_education->mother_middlename = $mother_middlename;
        $basic_education->mother_mobile = $mother_mobile;
        $basic_education->mother_phone = $mother_phone;
        $basic_education->guardian_lastname = $guardian_lastname;
        $basic_education->guardian_firstname = $guardian_firstname;
        $basic_education->guardian_middlename = $guardian_middlename;
        $basic_education->guardian_mobile = $guardian_mobile;
        $basic_education->guardian_phone = $guardian_phone;
        $basic_education->last_grade_level_completed = $last_grade_level_completed;
        $basic_education->last_school_year_completed = $last_school_year_completed;
        $basic_education->school_name = $school_name;
        $basic_education->school_id = $school_id;
        $basic_education->school_address = $school_address;
        $basic_education->semester = $semester;
        $basic_education->track = $track;
        $basic_education->strand = $strand;
        $basic_education->status = $status;

        if ($basic_education->save()) {
            return response(['success' => true, 'id' => $basic_education->id]);
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
        $basic_education = BasicEducation::select('*')
            ->where('id', $id)->get();

        return response(['data' => $basic_education]);
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
        $basic_education = BasicEducation::findOrFail($id);

        $birth_certificate_no = $request->input('birth_certificate_no');
        $learner_reference_number = $request->input('learner_reference_number');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        $ip_community = $request->input('ip_community');
        $mother_tongue = $request->input('mother_tongue');
        $house_no = $request->input('house_no');
        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $city = $request->input('city');
        $municipality = $request->input('municipality');
        $province = $request->input('province');
        $country = $request->input('country');
        $zipcode = $request->input('zipcode');
        $father_lastname = $request->input('father_lastname');
        $father_firstname = $request->input('father_firstname');
        $father_middlename = $request->input('father_middlename');
        $father_mobile = $request->input('father_mobile');
        $father_phone = $request->input('father_phone');
        $mother_lastname = $request->input('mother_lastname');
        $mother_firstname = $request->input('mother_firstname');
        $mother_middlename = $request->input('mother_middlename');
        $mother_mobile = $request->input('mother_mobile');
        $mother_phone = $request->input('mother_phone');
        $guardian_lastname = $request->input('guardian_lastname');
        $guardian_firstname = $request->input('guardian_firstname');
        $guardian_middlename = $request->input('guardian_middlename');
        $guardian_mobile = $request->input('guardian_mobile');
        $guardian_phone = $request->input('guardian_phone');
        $last_grade_level_completed = $request->input('last_grade_level_completed');
        $last_school_year_completed = $request->input('last_school_year_completed');
        $school_name = $request->input('school_name');
        $school_id = $request->input('school_id');
        $school_address = $request->input('school_address');
        $semester = $request->input('semester');
        $track = $request->input('track');
        $strand = $request->input('strand');
        $status = $request->input('status');

        $basic_education->birth_certificate_no = $birth_certificate_no;
        $basic_education->learner_reference_number = $learner_reference_number;
        $basic_education->lastname = $lastname;
        $basic_education->firstname = $firstname;
        $basic_education->middlename = $middlename;
        $basic_education->extension = $extension;
        $basic_education->birthdate = $birthdate;
        $basic_education->gender = $gender;
        $basic_education->ip_community = $ip_community;
        $basic_education->mother_tongue = $mother_tongue;
        $basic_education->house_no = $house_no;
        $basic_education->street = $street;
        $basic_education->baranggay = $baranggay;
        $basic_education->city = $city;
        $basic_education->municipality = $municipality;
        $basic_education->province = $province;
        $basic_education->country = $country;
        $basic_education->zipcode = $zipcode;
        $basic_education->father_lastname = $father_lastname;
        $basic_education->father_firstname = $father_firstname;
        $basic_education->father_middlename = $father_middlename;
        $basic_education->father_mobile = $father_mobile;
        $basic_education->father_phone = $father_phone;
        $basic_education->mother_lastname = $mother_lastname;
        $basic_education->mother_firstname = $mother_firstname;
        $basic_education->mother_middlename = $mother_middlename;
        $basic_education->mother_mobile = $mother_mobile;
        $basic_education->mother_phone = $mother_phone;
        $basic_education->guardian_lastname = $guardian_lastname;
        $basic_education->guardian_firstname = $guardian_firstname;
        $basic_education->guardian_middlename = $guardian_middlename;
        $basic_education->guardian_mobile = $guardian_mobile;
        $basic_education->guardian_phone = $guardian_phone;
        $basic_education->last_grade_level_completed = $last_grade_level_completed;
        $basic_education->last_school_year_completed = $last_school_year_completed;
        $basic_education->school_name = $school_name;
        $basic_education->school_id = $school_id;
        $basic_education->school_address = $school_address;
        $basic_education->semester = $semester;
        $basic_education->track = $track;
        $basic_education->strand = $strand;
        $basic_education->status = $status;

        if ($basic_education->save()) {
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
        $deleted = DB::table('basic_education')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
