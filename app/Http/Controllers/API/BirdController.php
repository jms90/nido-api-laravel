<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BirdResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CajaResource;
use App\Models\Bird;
use App\Models\Caja;

class BirdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birds = Bird::all();
        return response(['Aves' => BirdResource::collection($birds), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nombre'=>'required',
            'nombre_cientifico' => 'required',
            'img_ave' => 'required',
            'descripcion'=>'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $bird = Bird::create($data);

        return response(['Bird' => new BirdResource($bird), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function show(Bird $bird)
    {
        return response(['Ave' => new BirdResource($bird), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bird $bird)
    {
        $bird->update($request->all());

        return response(['Ave' => new BirdResource($bird), 'message' => 'Update successfully'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bird $bird)
    {
        $bird->delete();

        return response(['message' => 'Deleted']);
    }
}
