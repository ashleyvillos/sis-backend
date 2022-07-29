<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicEducation;

use DB;

use Illuminate\Support\Facades\Storage;

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

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        // $image = $request->input('image');
        $marital_status = $request->input('marital_status');
        $spouse_name = $request->input('spouse_name');
        $student_children_num = $request->input('student_children_num');
        $is_orphan = $request->input('is_orphan');
        $medical_condition = $request->input('medical_condition');
        $hobby = $request->input('hobby');
        $student_affiliation = $request->input('student_affiliation');
        $blood_type = $request->input('blood_type');
        $brothers_num = $request->input('brothers_num');
        $sisters_num = $request->input('sisters_num');
        $is_balik_aral = $request->input('is_balik_aral');
        $is_4p_beneficiary = $request->input('is_4p_beneficiary');
        $parent_affiliation = $request->input('parent_affiliation');
        $position = $request->input('position');
        $years_of_service = $request->input('years_of_service');
        $educational_background = $request->input('educational_background');
        $monthly_income = $request->input('monthly_income');
        $source_of_income = $request->input('source_of_income');
        $has_real_property = $request->input('has_real_property');
        $has_personal_property = $request->input('has_personal_property');
        $has_house = $request->input('has_house');
        $contact_num = $request->input('contact_num');
        $parent_children_num = $request->input('parent_children_num');
        $dependents_num = $request->input('dependents_num');
        $mode_of_transport = $request->input('mode_of_transport');
        $school_distance = $request->input('school_distance');
        $peace_condition = $request->input('peace_condition');
        $address = $request->input('address');
        $business_interest = $request->input('business_interest');

        $basic_education->lastname = $lastname;
        $basic_education->firstname = $firstname;
        $basic_education->middlename = $middlename;
        $basic_education->extension = $extension;
        $basic_education->birthdate = $birthdate;
        $basic_education->gender = $gender;
        // $basic_education->image = $image;
        $basic_education->marital_status = $marital_status;
        $basic_education->spouse_name = $spouse_name;
        $basic_education->student_children_num = $student_children_num;
        $basic_education->is_orphan = $is_orphan;
        $basic_education->medical_condition = $medical_condition;
        $basic_education->hobby = $hobby;
        $basic_education->student_affiliation = $student_affiliation;
        $basic_education->blood_type = $blood_type;
        $basic_education->brothers_num = $brothers_num;
        $basic_education->sisters_num = $sisters_num;
        $basic_education->is_balik_aral = $is_balik_aral;
        $basic_education->is_4p_beneficiary = $is_4p_beneficiary;
        $basic_education->parent_affiliation = $parent_affiliation;
        $basic_education->position = $position;
        $basic_education->years_of_service = $years_of_service;
        $basic_education->educational_background = $educational_background;
        $basic_education->monthly_income = $monthly_income;
        $basic_education->source_of_income = $source_of_income;
        $basic_education->has_real_property = $has_real_property;
        $basic_education->has_personal_property = $has_personal_property;
        $basic_education->has_house = $has_house;
        $basic_education->contact_num = $contact_num;
        $basic_education->parent_children_num = $parent_children_num;
        $basic_education->dependents_num = $dependents_num;
        $basic_education->mode_of_transport = $mode_of_transport;
        $basic_education->school_distance = $school_distance;
        $basic_education->peace_condition = $peace_condition;
        $basic_education->address = $address;
        $basic_education->business_interest = $business_interest;

        if ($file = $request->file('file')) {
            $file = $request->file->store('public/documents');
            $basic_education->image = $file;
        }

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

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        // $image = $request->input('image');
        $marital_status = $request->input('marital_status');
        $spouse_name = $request->input('spouse_name');
        $student_children_num = $request->input('student_children_num');
        $is_orphan = $request->input('is_orphan');
        $medical_condition = $request->input('medical_condition');
        $hobby = $request->input('hobby');
        $student_affiliation = $request->input('student_affiliation');
        $blood_type = $request->input('blood_type');
        $brothers_num = $request->input('brothers_num');
        $sisters_num = $request->input('sisters_num');
        $is_balik_aral = $request->input('is_balik_aral');
        $is_4p_beneficiary = $request->input('is_4p_beneficiary');
        $parent_affiliation = $request->input('parent_affiliation');
        $position = $request->input('position');
        $years_of_service = $request->input('years_of_service');
        $educational_background = $request->input('educational_background');
        $monthly_income = $request->input('monthly_income');
        $source_of_income = $request->input('source_of_income');
        $has_real_property = $request->input('has_real_property');
        $has_personal_property = $request->input('has_personal_property');
        $has_house = $request->input('has_house');
        $contact_num = $request->input('contact_num');
        $parent_children_num = $request->input('parent_children_num');
        $dependents_num = $request->input('dependents_num');
        $mode_of_transport = $request->input('mode_of_transport');
        $school_distance = $request->input('school_distance');
        $peace_condition = $request->input('peace_condition');
        $address = $request->input('address');
        $business_interest = $request->input('business_interest');

        $filename = $basic_education->image;

        $basic_education->lastname = $lastname ? $lastname : $basic_education->lastname;
        $basic_education->firstname = $firstname ? $firstname : $basic_education->firstname;
        $basic_education->middlename = $middlename ? $middlename : $basic_education->middlename;
        $basic_education->extension = $extension ? $extension : $basic_education->extension;
        $basic_education->birthdate = $birthdate ? $birthdate : $basic_education->birthdate;
        $basic_education->gender = $gender ? $gender : $basic_education->gender;
        $basic_education->marital_status = $marital_status ? $marital_status : $basic_education->marital_status;
        $basic_education->spouse_name = $spouse_name ? $spouse_name : $basic_education->spouse_name;
        $basic_education->student_children_num = $student_children_num ? $student_children_num : $basic_education->student_children_num;
        $basic_education->is_orphan = $is_orphan ? $is_orphan : $basic_education->is_orphan;
        $basic_education->medical_condition = $medical_condition ? $medical_condition : $basic_education->medical_condition;
        $basic_education->hobby = $hobby ? $hobby : $basic_education->hobby;
        $basic_education->student_affiliation = $student_affiliation ? $student_affiliation : $basic_education->student_affiliation;
        $basic_education->blood_type = $blood_type ? $blood_type : $basic_education->blood_type;
        $basic_education->brothers_num = $brothers_num ? $brothers_num : $basic_education->brothers_num;
        $basic_education->sisters_num = $sisters_num ? $sisters_num : $basic_education->sisters_num;
        $basic_education->is_balik_aral = $is_balik_aral ? $is_balik_aral : $basic_education->is_balik_aral;
        $basic_education->is_4p_beneficiary = $is_4p_beneficiary ? $is_4p_beneficiary : $basic_education->is_4p_beneficiary;
        $basic_education->parent_affiliation = $parent_affiliation ? $parent_affiliation : $basic_education->parent_affiliation;
        $basic_education->position = $position ? $position : $basic_education->position;
        $basic_education->years_of_service = $years_of_service ? $years_of_service : $basic_education->years_of_service;
        $basic_education->educational_background = $educational_background ? $educational_background : $basic_education->educational_background;
        $basic_education->monthly_income = $monthly_income ? $monthly_income : $basic_education->monthly_income;
        $basic_education->source_of_income = $source_of_income ? $source_of_income : $basic_education->source_of_income;
        $basic_education->has_real_property = $has_real_property ? $has_real_property : $basic_education->has_real_property;
        $basic_education->has_personal_property = $has_personal_property ? $has_personal_property : $basic_education->has_personal_property;
        $basic_education->has_house = $has_house ? $has_house : $basic_education->has_house;
        $basic_education->contact_num = $contact_num ? $contact_num : $basic_education->contact_num;
        $basic_education->parent_children_num = $parent_children_num ? $parent_children_num : $basic_education->parent_children_num;
        $basic_education->dependents_num = $dependents_num ? $dependents_num : $basic_education->dependents_num;
        $basic_education->mode_of_transport = $mode_of_transport ? $mode_of_transport : $basic_education->mode_of_transport;
        $basic_education->school_distance = $school_distance ? $school_distance : $basic_education->school_distance;
        $basic_education->peace_condition = $peace_condition ? $peace_condition : $basic_education->peace_condition;
        $basic_education->address = $address ? $address : $basic_education->address;
        $basic_education->business_interest = $business_interest ? $business_interest : $basic_education->business_interest;
        

        if ($file = $request->file('file')) {
            $file = $request->file->store('public/documents');
            $basic_education->image = $file;    
        }

        if ($basic_education->save()) {
            Storage::delete($filename);
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }

    public function updateForm(Request $request, $id)
    {
        $basic_education = BasicEducation::findOrFail($id);

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');
        // $image = $request->input('image');
        $marital_status = $request->input('marital_status');
        $spouse_name = $request->input('spouse_name');
        $student_children_num = $request->input('student_children_num');
        $is_orphan = $request->input('is_orphan');
        $medical_condition = $request->input('medical_condition');
        $hobby = $request->input('hobby');
        $student_affiliation = $request->input('student_affiliation');
        $blood_type = $request->input('blood_type');
        $brothers_num = $request->input('brothers_num');
        $sisters_num = $request->input('sisters_num');
        $is_balik_aral = $request->input('is_balik_aral');
        $is_4p_beneficiary = $request->input('is_4p_beneficiary');
        $parent_affiliation = $request->input('parent_affiliation');
        $position = $request->input('position');
        $years_of_service = $request->input('years_of_service');
        $educational_background = $request->input('educational_background');
        $monthly_income = $request->input('monthly_income');
        $source_of_income = $request->input('source_of_income');
        $has_real_property = $request->input('has_real_property');
        $has_personal_property = $request->input('has_personal_property');
        $has_house = $request->input('has_house');
        $contact_num = $request->input('contact_num');
        $parent_children_num = $request->input('parent_children_num');
        $dependents_num = $request->input('dependents_num');
        $mode_of_transport = $request->input('mode_of_transport');
        $school_distance = $request->input('school_distance');
        $peace_condition = $request->input('peace_condition');
        $address = $request->input('address');
        $business_interest = $request->input('business_interest');

        $filename = $basic_education->image;

        $basic_education->lastname = $lastname ? $lastname : $basic_education->lastname;
        $basic_education->firstname = $firstname ? $firstname : $basic_education->firstname;
        $basic_education->middlename = $middlename ? $middlename : $basic_education->middlename;
        $basic_education->extension = $extension ? $extension : $basic_education->extension;
        $basic_education->birthdate = $birthdate ? $birthdate : $basic_education->birthdate;
        $basic_education->gender = $gender ? $gender : $basic_education->gender;
        $basic_education->marital_status = $marital_status ? $marital_status : $basic_education->marital_status;
        $basic_education->spouse_name = $spouse_name ? $spouse_name : $basic_education->spouse_name;
        $basic_education->student_children_num = $student_children_num ? $student_children_num : $basic_education->student_children_num;
        $basic_education->is_orphan = $is_orphan ? $is_orphan : $basic_education->is_orphan;
        $basic_education->medical_condition = $medical_condition ? $medical_condition : $basic_education->medical_condition;
        $basic_education->hobby = $hobby ? $hobby : $basic_education->hobby;
        $basic_education->student_affiliation = $student_affiliation ? $student_affiliation : $basic_education->student_affiliation;
        $basic_education->blood_type = $blood_type ? $blood_type : $basic_education->blood_type;
        $basic_education->brothers_num = $brothers_num ? $brothers_num : $basic_education->brothers_num;
        $basic_education->sisters_num = $sisters_num ? $sisters_num : $basic_education->sisters_num;
        $basic_education->is_balik_aral = $is_balik_aral ? $is_balik_aral : $basic_education->is_balik_aral;
        $basic_education->is_4p_beneficiary = $is_4p_beneficiary ? $is_4p_beneficiary : $basic_education->is_4p_beneficiary;
        $basic_education->parent_affiliation = $parent_affiliation ? $parent_affiliation : $basic_education->parent_affiliation;
        $basic_education->position = $position ? $position : $basic_education->position;
        $basic_education->years_of_service = $years_of_service ? $years_of_service : $basic_education->years_of_service;
        $basic_education->educational_background = $educational_background ? $educational_background : $basic_education->educational_background;
        $basic_education->monthly_income = $monthly_income ? $monthly_income : $basic_education->monthly_income;
        $basic_education->source_of_income = $source_of_income ? $source_of_income : $basic_education->source_of_income;
        $basic_education->has_real_property = $has_real_property ? $has_real_property : $basic_education->has_real_property;
        $basic_education->has_personal_property = $has_personal_property ? $has_personal_property : $basic_education->has_personal_property;
        $basic_education->has_house = $has_house ? $has_house : $basic_education->has_house;
        $basic_education->contact_num = $contact_num ? $contact_num : $basic_education->contact_num;
        $basic_education->parent_children_num = $parent_children_num ? $parent_children_num : $basic_education->parent_children_num;
        $basic_education->dependents_num = $dependents_num ? $dependents_num : $basic_education->dependents_num;
        $basic_education->mode_of_transport = $mode_of_transport ? $mode_of_transport : $basic_education->mode_of_transport;
        $basic_education->school_distance = $school_distance ? $school_distance : $basic_education->school_distance;
        $basic_education->peace_condition = $peace_condition ? $peace_condition : $basic_education->peace_condition;
        $basic_education->address = $address ? $address : $basic_education->address;
        $basic_education->business_interest = $business_interest ? $business_interest : $basic_education->business_interest;
        

        if ($file = $request->file('file')) {
            $file = $request->file->store('public/documents');
            $basic_education->image = $file;    
        }

        if ($basic_education->save()) {
            Storage::delete($filename);
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
