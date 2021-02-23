<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\Caja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resource\CajaResource;
use App\Http\Resources\CajaResource as ResourcesCajaResource;
use App\Models\Caja as ModelsCaja;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajas = ModelsCaja::all();
        return response(['cajas' => ResourcesCajaResource::collection($cajas), 'message' => 'Retrieved successfully'], 200);
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
            'cod_caja'=>'required',
            'latitud' => 'required|max:255',
            'longitud' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $caja = ModelsCaja::create($data);

        return response(['project' => new ResourcesCajaResource($caja), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsCaja $caja)
    {
        return response(['caja' => new ResourcesCajaResource($caja), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsCaja $caja)
    {
        $caja->update($request->all());

        return response(['caja' => new ResourcesCajaResource($caja), 'message' => 'Update successfully'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsCaja $caja)
    {
        $caja->delete();

        return response(['message' => 'Deleted']);
    }
}
