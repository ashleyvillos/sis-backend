<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Madaris;

use DB;

class MadarisController extends Controller
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
        $madaris = new Madaris;

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

        $madaris->firstname = $firstname;
        $madaris->lastname = $lastname;
        $madaris->middlename = $middlename;
        $madaris->extension = $extension;
        $madaris->gender = $gender;
        $madaris->birthdate = $birthdate;
        $madaris->birthplace = $birthplace;
        $madaris->nationality = $nationality;
        $madaris->street = $street;
        $madaris->baranggay = $baranggay;
        $madaris->district = $district;
        $madaris->region = $region;
        $madaris->province = $province;
        $madaris->city = $city;
        $madaris->email = $email;
        $madaris->mobile = $mobile;
        $madaris->phone = $phone;
        $madaris->guardian = $guardian;
        $madaris->guardian_address = $guardian_address;
        $madaris->beneficiary = $beneficiary;
        $madaris->relationship_to_beneficiary = $relationship_to_beneficiary;

        if ($madaris->save()) {
            return response(['success' => true, 'id' => $madaris->id]);
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
        $madaris = Madaris::select('*')
            ->where('id', $id)->get();

        return response(['data' => $madaris]);
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
        $madaris = Madaris::findOrFail($id);;

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

        $madaris->firstname = $firstname;
        $madaris->lastname = $lastname;
        $madaris->middlename = $middlename;
        $madaris->extension = $extension;
        $madaris->gender = $gender;
        $madaris->birthdate = $birthdate;
        $madaris->birthplace = $birthplace;
        $madaris->nationality = $nationality;
        $madaris->street = $street;
        $madaris->baranggay = $baranggay;
        $madaris->district = $district;
        $madaris->region = $region;
        $madaris->province = $province;
        $madaris->city = $city;
        $madaris->email = $email;
        $madaris->mobile = $mobile;
        $madaris->phone = $phone;
        $madaris->guardian = $guardian;
        $madaris->guardian_address = $guardian_address;
        $madaris->beneficiary = $beneficiary;
        $madaris->relationship_to_beneficiary = $relationship_to_beneficiary;

        if ($madaris->save()) {
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
        $deleted = DB::table('madaris')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
