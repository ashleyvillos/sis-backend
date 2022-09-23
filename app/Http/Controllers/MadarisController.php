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

        $madaris->firstname = $firstname;
        $madaris->lastname = $lastname;
        $madaris->middlename = $middlename;
        $madaris->extension = $extension;
        $madaris->gender = $gender;
        $madaris->birthdate = $birthdate;
        $madaris->mother_tongue = $mother_tongue;
        $madaris->ip_community = $ip_community;

        $madaris->street = $street;
        $madaris->baranggay = $baranggay;
        $madaris->district = $district;
        $madaris->region = $region;
        $madaris->province = $province;
        $madaris->city = $city;
        $madaris->zip_code = $zip_code;

        $madaris->father = $father;
        $madaris->mother = $mother;
        $madaris->guardian = $guardian;
        $madaris->telephone = $telephone;
        $madaris->cellphone = $cellphone;

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

        $madaris->firstname = $firstname;
        $madaris->lastname = $lastname;
        $madaris->middlename = $middlename;
        $madaris->extension = $extension;
        $madaris->gender = $gender;
        $madaris->birthdate = $birthdate;
        $madaris->mother_tongue = $mother_tongue;
        $madaris->ip_community = $ip_community;

        $madaris->street = $street;
        $madaris->baranggay = $baranggay;
        $madaris->district = $district;
        $madaris->region = $region;
        $madaris->province = $province;
        $madaris->city = $city;
        $madaris->zip_code = $zip_code;

        $madaris->father = $father;
        $madaris->mother = $mother;
        $madaris->guardian = $guardian;
        $madaris->telephone = $telephone;
        $madaris->cellphone = $cellphone;

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
