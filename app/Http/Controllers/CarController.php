<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    const PATH_VIEW = 'cars.';
    const PATH_UPLOAD= 'cars';

    public function index()
    {
        $data= Car::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->except('car_image');
        if($request->hasFile('car_image')){
            $data['car_image']= Storage::put(self::PATH_UPLOAD, $request->file('car_image'));
        }
        $res = Car::query()->create($data);

        if($res){
            return redirect()->back()->with('success', 'Bạn thêm thành công');
        }else{
            return redirect()->back()->with('danger', 'Bạn thêm không thành công');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Car::query()->findOrFail($id);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        $model= Car::query()->findOrFail($id);

        $data = $request->except('car_image');
        if($request->hasFile('car_image')){
            $data['car_image']= Storage::put(self::PATH_UPLOAD, $request->file('car_image'));
        }
        $cover = $model->car_image;

        $res = $model->update($data);
        if($request->hasFile('car_image') && $cover && Storage::exists($cover)){
            Storage::delete($cover);
        }

        if($res){
            return redirect()->back()->with('success', 'Bạn sửa thành công');
        }else{
            return redirect()->back()->with('danger', 'Bạn sửa không thành công');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Car::query()->findOrFail($id);
        $data->delete();
        return back();
    }
}
