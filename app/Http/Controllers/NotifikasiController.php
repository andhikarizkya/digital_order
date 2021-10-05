<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifikasi = Notifikasi::orderBy('id', 'DESC')->get();
        $response = [
            'massage' =>  'list notifikasi order by id',
            'data' => $notifikasi
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => ['required', 'numeric'],
            'status' => ['required'],
            'deskripsi' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $notifikasi = Notifikasi::create($request->all());
            $response = [
                'massage' => 'notifikasi created',
                'data' => $notifikasi
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $response = [
            'massage' => 'Detail of notifikasi',
            'data' => $notifikasi
        ];


        return response()->json($response, Response::HTTP_OK);
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
        $notifikasi = Notifikasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_user' => ['required', 'numeric'],
            'status' => ['required'],
            'deskripsi' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $notifikasi->update($request->all());
            $response = [
                'massage' => 'notifikasi update',
                'data' => $notifikasi
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);

        try {
            $notifikasi->delete();
            $response = [
                'massage' => 'notifikasi delete',
                'data' => $notifikasi
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
