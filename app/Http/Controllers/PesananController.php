<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::orderBy('time', 'DESC')->get();
        $response = [
            'massage' =>  'list pesanan order by time',
            'data' => $pesanan
        ];

        return response()->json($response, Response::HTTP_OK);
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
        $validator = Validator::make($request->all(), [
            'no_meja' => ['required', 'numeric'],
            'nama_pemesan' => ['required'],
            'no_telpon' => ['required', 'numeric', 'digits_between:11,12'],
            'jumlah_menu' => ['required', 'min:1', 'numeric'],
            'total_harga' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pesanan = Pesanan::create($request->all());
            $response = [
                'massage' => 'pesanan created',
                'data' => $pesanan
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
        $pesanan = Pesanan::findOrFail($id);
        $response = [
            'massage' => 'Detail of pesanan',
            'data' => $pesanan
        ];
        //kurang kasih liat list detail pesanan

        return response()->json($response, Response::HTTP_OK);
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
        $pesanan = Pesanan::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'no_meja' => ['required', 'numeric'],
            'nama_pemesan' => ['required'],
            'no_telpon' => ['required', 'numeric', 'digits_between:11,12'],
            'jumlah_menu' => ['required', 'min:1', 'numeric'],
            'total_harga' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pesanan->update($request->all());
            $response = [
                'massage' => 'pesanan update',
                'data' => $pesanan
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
        $pesanan = Pesanan::findOrFail($id);

        try {
            $pesanan->delete();
            $response = [
                'massage' => 'pesanan delete',
                'data' => $pesanan
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
