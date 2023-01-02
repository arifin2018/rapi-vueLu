<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Sclass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\SclassRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sclass::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SclassRequest $request)
    {
        Sclass::create($request->all());
        return response()->json([
            'data'  => 'success insert data'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sclass::findOrFail($id);
        return response()->json([
            'data' => $data
        ], Response::HTTP_FOUND);
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
        Sclass::findOrFail($id)->update($request->all());
        return response()->json([
            'data' => 'successfuly update data'
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sclass::destroy($id);
        return response()->json([
            'data'  => 'successfuly delete data'
        ], Response::HTTP_OK);
    }
}
