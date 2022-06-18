<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingItem;

use DB;

class BillingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $billing_items = BillingItem::select('id', 'name', 'code', 'description', 'category', 'cost')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $billing_items, 'limit' => $limit]);
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
        $billing_item = new BillingItem;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $category = $request->input('category');
        $cost = $request->input('cost');

        $billing_item->name = $name;
        $billing_item->code = $code;
        $billing_item->description = $description;
        $billing_item->category = $category;
        $billing_item->cost = $cost;

        if ($billing_item->save()) {
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
        $billing_item = BillingItem::findOrFail($id);

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $category = $request->input('category');
        $cost = $request->input('cost');

        $billing_item->name = $name;
        $billing_item->code = $code;
        $billing_item->description = $description;
        $billing_item->category = $category;
        $billing_item->cost = $cost;

        if ($billing_item->save()) {
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
        $deleted = DB::table('billing_items')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
