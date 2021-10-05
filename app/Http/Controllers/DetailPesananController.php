<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = DetailPesanan::orderBy('id', 'DESC')->get();
        $response = [
            'massage' =>  'list detail pesanan order by id',
            'data' => $detail
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
            'id_pesanan' => ['required', 'numeric'],
            'id_menu' => ['required', 'numeric'],
            'jumlah_pesanan' => ['required', 'min:1', 'numeric'],
            'status' => ['required'],
            'total_harga' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $detail = DetailPesanan::create($request->all());
            $response = [
                'massage' => 'detail pesanan created',
                'data' => $detail
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
        $detail = DetailPesanan::findOrFail($id);
        $response = [
            'massage' => 'Detail of pesanan',
            'data' => $detail
        ];
        //kurang kasih liat list detail pesanan dari id pesanan tertentu

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pesanan)
    {
        $detail = DetailPesanan::findOrFail($id_pesanan);

        $validator = Validator::make($request->all(), [
            'id_pesanan' => ['required', 'numeric'],
            'id_menu' => ['required', 'numeric'],
            'jumlah_pesanan' => ['required', 'min:1', 'numeric'],
            'status' => ['required'],
            'total_harga' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $detail->update($request->all());
            $response = [
                'massage' => 'detail pesanan update',
                'data' => $detail
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
        $detail = DetailPesanan::findOrFail($id);

        try {
            $detail->delete();
            $response = [
                'massage' => 'detail pesanan delete',
                'data' => $detail
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
