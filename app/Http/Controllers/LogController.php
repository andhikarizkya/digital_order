<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = Log::orderBy('time', 'DESC')->get();
        $response = [
            'massage' =>  'list Log order by time',
            'data' => $log
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
            'event' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $log = Log::create($request->all());
            $response = [
                'massage' => 'log event created',
                'data' => $log
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
        $log = Log::findOrFail($id);
        $response = [
            'massage' => 'Detail of log',
            'data' => $log
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
        $log = Log::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_user' => ['required', 'numeric'],
            'event' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $log->update($request->all());
            $response = [
                'massage' => 'log update',
                'data' => $log
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
        $log = Log::findOrFail($id);

        try {
            $log->delete();
            $response = [
                'massage' => 'log delete',
                'data' => $log
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
