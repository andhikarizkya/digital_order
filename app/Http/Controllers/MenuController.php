<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('time', 'DESC')->get();
        $response = [
            'massage' =>  'list menu order by time',
            'data' => $menu
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
            'nama' => ['required'],
            'kategori_id' => ['required'],
            'stock' => ['required', 'numeric'],
            'foto_menu' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg|max:2048'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required']
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($request->hasFile('foto_menu')) {
            $path = $request->file('foto_menu')->store('menu_images');
            $request->foto_menu = $path;
            // $request->file('foto_menu')->move(public_path('img/menu/'), $request->file('foto_menu')->getClientOriginalName());
            // $request->foto_menu = 'img/menu' . $request->file('foto_menu')->getClientOriginalName();
        }

        try {
            //input all : tidak bisa karena ada file path foto
            // $menu = Menu::create( $request->all());

            //input manual untuk menghilangkan kerusakan input foto
            $menu = new Menu();
            $menu->nama = $request->nama;
            $menu->kategori_id = $request->kategori_id;
            $menu->stock = $request->stock;
            $menu->foto_menu = $request->foto_menu;
            $menu->harga = $request->harga;
            $menu->deskripsi = $request->deskripsi;
            $menu->save();

            $response = [
                'massage' => 'menu created',
                'data' => $menu
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
        $menu = Menu::findOrFail($id);
        $response = [
            'massage' => 'Detail of menu',
            'data' => $menu
        ];

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
        $menu = Menu::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'kategori_id' => ['required'],
            'stock' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'foto_menu' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg|max:2048']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($request->hasFile('foto_menu')) {
            $path = $request->file('foto_menu')->store('menu_images');
            $request->foto_menu = $path;
        }

        try {
            $menu->nama = $request->nama;
            $menu->kategori_id = $request->kategori_id;
            $menu->stock = $request->stock;
            $menu->foto_menu = $request->foto_menu;
            $menu->harga = $request->harga;
            $menu->deskripsi = $request->deskripsi;
            $menu->save();

            $response = [
                'massage' => 'menu update',
                'data' => $menu
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
        $menu = Menu::findOrFail($id);

        try {
            $menu->delete();
            $response = [
                'massage' => 'menu deleted',
                'data' => $menu
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "failed".$e->errorInfo
            ]);
        }
    }
}
