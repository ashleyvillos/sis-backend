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

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $mother_tongue = $request->input('mother_tongue');
        $ip_community = $request->input('ip_community');

        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $district = $request->input('district');
        $region = $request->input('region');
        $province = $request->input('province');
        $city = $request->input('city');
        $zip_code = $request->input('zip_code');

        $father = $request->input('father');
        $mother = $request->input('mother');
        $guardian = $request->input('guardian');
        $telephone = $request->input('telephone');
        $cellphone = $request->input('cellphone');

        $higher_education->firstname = $firstname;
        $higher_education->lastname = $lastname;
        $higher_education->middlename = $middlename;
        $higher_education->extension = $extension;
        $higher_education->gender = $gender;
        $higher_education->birthdate = $birthdate;
        $higher_education->mother_tongue = $mother_tongue;
        $higher_education->ip_community = $ip_community;

        $higher_education->street = $street;
        $higher_education->baranggay = $baranggay;
        $higher_education->district = $district;
        $higher_education->region = $region;
        $higher_education->province = $province;
        $higher_education->city = $city;
        $higher_education->zip_code = $zip_code;

        $higher_education->father = $father;
        $higher_education->mother = $mother;
        $higher_education->guardian = $guardian;
        $higher_education->telephone = $telephone;
        $higher_education->cellphone = $cellphone;

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

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $mother_tongue = $request->input('mother_tongue');
        $ip_community = $request->input('ip_community');

        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $district = $request->input('district');
        $region = $request->input('region');
        $province = $request->input('province');
        $city = $request->input('city');
        $zip_code = $request->input('zip_code');

        $father = $request->input('father');
        $mother = $request->input('mother');
        $guardian = $request->input('guardian');
        $telephone = $request->input('telephone');
        $cellphone = $request->input('cellphone');

        $higher_education->firstname = $firstname;
        $higher_education->lastname = $lastname;
        $higher_education->middlename = $middlename;
        $higher_education->extension = $extension;
        $higher_education->gender = $gender;
        $higher_education->birthdate = $birthdate;
        $higher_education->mother_tongue = $mother_tongue;
        $higher_education->ip_community = $ip_community;

        $higher_education->street = $street;
        $higher_education->baranggay = $baranggay;
        $higher_education->district = $district;
        $higher_education->region = $region;
        $higher_education->province = $province;
        $higher_education->city = $city;
        $higher_education->zip_code = $zip_code;

        $higher_education->father = $father;
        $higher_education->mother = $mother;
        $higher_education->guardian = $guardian;
        $higher_education->telephone = $telephone;
        $higher_education->cellphone = $cellphone;

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
