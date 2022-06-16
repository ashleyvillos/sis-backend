<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;

use DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 10;

        $libraries = Library::select('id', 'name', 'code', 'description', 'url')
            ->orderBy('id')->paginate($limit);

        return response(['data' => $libraries, 'limit' => $limit]);
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
        $library = new Library;

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $url = $request->input('url');

        $library->name = $name;
        $library->code = $code;
        $library->description = $description;
        $library->url = $url;

        if ($library->save()) {
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
        $library = Library::findOrFail($id);

        $name = $request->input('name');
        $code = $request->input('code');
        $description = $request->input('description');
        $url = $request->input('url');

        $library->name = $name;
        $library->code = $code;
        $library->description = $description;
        $library->url = $url;

        if ($library->save()) {
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
        $deleted = DB::table('libraries')->delete($id);

        if ($deleted) {
            return response(['success' => true]);
        }

        return response(['success' => false]);
    }
}
