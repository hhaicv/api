<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $data = Car::query()->get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->all();

        $res = Car::query()->create($data);
        return response()->json($data, 201);
    }


    public function show(string $id)
    {
        $data = Car::query()->findOrFail($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        $model = Car::query()->findOrFail($id);

        $data = $request->all();


        $res = $model->update($data);
        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Car::query()->findOrFail($id);
        $data->delete();
        return response()->json(200);
    }
}
