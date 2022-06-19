<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;

use DB;

class BillingController extends Controller
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

        $billings = Billing::select(
        'billings.id', 'billings.enrollment_id', 'billings.billing_items_id', 
        'billings.debit', 'billings.credit', 'enrollments.sy', 'billing_items.id as billing_items_id', 
        'billing_items.name', 'billing_items.code', 'billing_items.description', 
        'billing_items.category', 'billing_items.cost', 
        'terms.name as term', 'courses.name as course', 'students.id',
        'basic_education.lastname as basic_education_lastname', 'basic_education.firstname as basic_education_firstname', 
        'basic_education.middlename as basic_education_middlename', 'basic_education.gender as basic_education_gender',
        'madaris.lastname as madaris_lastname', 'madaris.firstname as madaris_firstname', 
        'madaris.middlename as madaris_middlename', 'madaris.gender as madaris_gender',
        'higher_education.lastname as higher_education_lastname', 'higher_education.firstname as higher_education_firstname', 
        'higher_education.middlename as higher_education_middlename', 'higher_education.gender as higher_education_gender',
        'techvocs.lastname as techvocs_lastname', 'techvocs.firstname as techvocs_firstname', 
        'techvocs.middlename as techvocs_middlename', 'techvocs.gender as techvocs_gender'
        )
        ->leftJoin('enrollments', 'enrollments.id', '=', 'billings.id')
        ->leftJoin('billing_items', 'billing_items.id', '=', 'billings.billing_items_id')
        ->leftJoin('students', 'enrollments.student_id', '=', 'students.id')
        ->leftJoin('terms', 'enrollments.term_id', '=', 'terms.id')
        ->leftJoin('courses', 'enrollments.course_id', '=', 'courses.id')
        ->leftJoin('basic_education', 'basic_education.id', '=', 'students.basic_education_id')
        ->leftJoin('madaris', 'madaris.id', '=', 'students.madaris_id')
        ->leftJoin('higher_education', 'higher_education.id', '=', 'students.higher_education_id')
        ->leftJoin('techvocs', 'techvocs.id', '=', 'students.techvoc_id');

        if ($enrollment_id > 0) {
            $billings = $billings->where('enrollments.id', $enrollment_id);
        }

        $billings = $billings->orderBy('enrollments.created_at', 'desc')->paginate($limit);

        return response(['data' => $billings, 'limit' => $limit]);
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
        // $billing = new Billing;

        // $enrollment_id = $request->input('enrollment_id');
        // $billing_items_id = $request->input('billing_items_id');
        // $debit = $request->input('debit');
        // $credit = $request->input('credit');

        // $billing->enrollment_id = $enrollment_id;
        // $billing->billing_items_id = $billing_items_id;
        // $billing->debit = $debit;
        // $billing->credit = $credit;

        $data = $request->data;

        // if ($data)
        if ($data && Billing::insert($data)) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
        // return response(['success' => $request->data]);

        
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
        // $billing = Billing::findOrFail($id);

        // $enrollment_id = $request->input('enrollment_id');
        // $billing_items_id = $request->input('billing_items_id');
        // $debit = $request->input('debit');
        // $credit = $request->input('credit');

        // $billing->enrollment_id = $enrollment_id;
        // $billing->billing_items_id = $billing_items_id;
        // $billing->debit = $debit;
        // $billing->credit = $credit;

        // if ($billing->save()) {
        //     return response(['success' => true]);
        // }

        $data = $request->data;

        if ($data) {
            $deleted = Billing::where('enrollment_id', $id)->delete();
            if (Billing::insert($data)) {
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
        $deleted = DB::table('billings')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
