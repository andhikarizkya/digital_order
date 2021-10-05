<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'DESC')->get();
        $response = [
            'massage' =>  'list transaksil pesanan order by id',
            'data' => $transaksi
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
            'status_transaksi' => ['required','in:sukses,gagal'],
            'metode_pembayaran' => ['required','in:cash,atm'],
            'id_user' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaksi = Transaksi::create($request->all());
            $response = [
                'massage' => 'transaksi created',
                'data' => $transaksi
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
        $transaksi = Transaksi::findOrFail($id);
        $response = [
            'massage' => 'Detail of transaksi',
            'data' => $transaksi
        ];
        //kurang kasih liat list detail pesanan

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
        $transaksi = Transaksi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_pesanan' => ['required', 'numeric'],
            'status_transaksi' => ['required','in:sukses,gagal'],
            'metode_pembayaran' => ['required','in:cash,atm'],
            'id_user' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaksi->update($request->all());
            $response = [
                'massage' => 'transaksi pesanan update',
                'data' => $transaksi
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
        $transaksi = Transaksi::findOrFail($id);

        try {
            $transaksi->delete();
            $response = [
                'massage' => 'transaksi delete',
                'data' => $transaksi
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
