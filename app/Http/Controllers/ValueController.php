<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Repository\valueRepo;

class ValueController extends Controller
{
   public function __construct(public valueRepo $valueRepo){}

    public function index()
    {
        return $this->valueRepo->index();
    }

    public function store(StoreValueRequest $request)
    {

        $this->valueRepo->create($request);
        return response()->json(['ok'] , 200) ;
    }

    public function show(Value $value)
    {
        //
    }

    public function update(UpdateValueRequest $request, Value $value)
    {
        //
    }

    public function destroy(Value $value)
    {
        //
    }
}
