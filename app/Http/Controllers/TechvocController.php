<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Techvoc;

use DB;

class TechvocController extends Controller
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
        $techvoc = new Techvoc;

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        $nationality = $request->input('nationality');
        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $district = $request->input('district');
        $region = $request->input('region');
        $province = $request->input('province');
        $city = $request->input('city');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $phone = $request->input('phone');
        $guardian = $request->input('guardian');
        $guardian_address = $request->input('guardian_address');
        $beneficiary = $request->input('beneficiary');
        $relationship_to_beneficiary = $request->input('relationship_to_beneficiary');

        $techvoc->firstname = $firstname;
        $techvoc->lastname = $lastname;
        $techvoc->middlename = $middlename;
        $techvoc->extension = $extension;
        $techvoc->gender = $gender;
        $techvoc->birthdate = $birthdate;
        $techvoc->birthplace = $birthplace;
        $techvoc->nationality = $nationality;
        $techvoc->street = $street;
        $techvoc->baranggay = $baranggay;
        $techvoc->district = $district;
        $techvoc->region = $region;
        $techvoc->province = $province;
        $techvoc->city = $city;
        $techvoc->email = $email;
        $techvoc->mobile = $mobile;
        $techvoc->phone = $phone;
        $techvoc->guardian = $guardian;
        $techvoc->guardian_address = $guardian_address;
        $techvoc->beneficiary = $beneficiary;
        $techvoc->relationship_to_beneficiary = $relationship_to_beneficiary;

        if ($techvoc->save()) {
            return response(['success' => true, 'id' => $techvoc->id]);
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
        $techvoc = Techvoc::select('*')
            ->where('id', $id)->get();

        return response(['data' => $techvoc]);
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
        $techvoc = Techvoc::findOrFail($id);

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');
        $extension = $request->input('extension');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        $nationality = $request->input('nationality');
        $street = $request->input('street');
        $baranggay = $request->input('baranggay');
        $district = $request->input('district');
        $region = $request->input('region');
        $province = $request->input('province');
        $city = $request->input('city');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $phone = $request->input('phone');
        $guardian = $request->input('guardian');
        $guardian_address = $request->input('guardian_address');
        $beneficiary = $request->input('beneficiary');
        $relationship_to_beneficiary = $request->input('relationship_to_beneficiary');

        $techvoc->firstname = $firstname;
        $techvoc->lastname = $lastname;
        $techvoc->middlename = $middlename;
        $techvoc->extension = $extension;
        $techvoc->gender = $gender;
        $techvoc->birthdate = $birthdate;
        $techvoc->birthplace = $birthplace;
        $techvoc->nationality = $nationality;
        $techvoc->street = $street;
        $techvoc->baranggay = $baranggay;
        $techvoc->district = $district;
        $techvoc->region = $region;
        $techvoc->province = $province;
        $techvoc->city = $city;
        $techvoc->email = $email;
        $techvoc->mobile = $mobile;
        $techvoc->phone = $phone;
        $techvoc->guardian = $guardian;
        $techvoc->guardian_address = $guardian_address;
        $techvoc->beneficiary = $beneficiary;
        $techvoc->relationship_to_beneficiary = $relationship_to_beneficiary;

        if ($techvoc->save()) {
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
        $deleted = DB::table('techvoc')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
