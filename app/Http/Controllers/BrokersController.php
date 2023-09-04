<?php

namespace App\Http\Controllers;
use App\Http\Resources\BrokersResource;
use Illuminate\Http\Request;
use \App\Models\Broker;
use \App\Http\Requests\StoreBrokerRequest;

class BrokersController extends Controller
{

    public function index()
    {
        return BrokersResource::collection(Broker::all());
    }


    public function store(StoreBrokerRequest $request)
    {
        $request->validated();

        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo_path' => $request->logo_path,
        ]);

        return new BrokersResource($broker);
    }


    public function show(Broker $broker)
    {
        return new BrokersResource($broker);
    }


    public function update(StoreBrokerRequest $request, Broker $broker)
    {
        //ray($request);
        $request->validated();

        $broker->update($request->only([
            'name', 'address', 'city', 'zip_code', 'phone_number', 'logo_path'
            ]));

        return new BrokersResource($broker);
    }

    public function destroy(Broker $broker)
    {
        $broker->delete();

        return response()->json([
            'success'=> true,
            'message'=> 'Broker has been deleted from database',
        ]);
    }
}
