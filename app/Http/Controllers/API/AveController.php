<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AveResource;
use App\Models\Ave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aves = Ave::all();
        return response(['Aves' => AveResource::collection($aves), 'Retrieved successfully'], 200);
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
            'nombre',
            'nombre_cientifico',
            'informacion',
            'img_ave'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ave  $ave
     * @return \Illuminate\Http\Response
     */
    public function show(Ave $ave)
    {
        return response(['ave' => new AveResource($ave), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ave  $ave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ave $ave)
    {
        $ave->update($request->all());

        return response(['ave' => new AveResource($ave), 'message' => 'Update succesfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ave  $ave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ave $ave)
    {
        $ave->delete();

        return response(['message' => 'Deleted']);
    }
}
