<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Repository\attributeRepo;

class AttributeController extends Controller
{
    public function __construct(public attributeRepo $attributeRepo)
    {
    }

    public function index()
    {
        return $this->attributeRepo->index();
    }

    public function store(StoreAttributeRequest $request)
    {
        $this->attributeRepo->create($request);
        return response()->json(['ok'],200);
    }


    public function show(Attribute $attribute)
    {
        //
    }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        //
    }


    public function destroy(Attribute $attribute)
    {
        //
    }
}
