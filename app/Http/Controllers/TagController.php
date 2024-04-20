<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Repository\attributeRepo;
use App\Repository\tagRepo;
use App\Repository\valueRepo;

class TagController extends Controller
{

    public function __construct(public tagRepo $tagRepo){}

    public function index()
    {
        return $this->tagRepo->index();
    }

    public function store(StoreTagRequest $request , attributeRepo $attributeRepo , valueRepo $valueRepo)
    {
        $attributeRepo = $attributeRepo->getfindId(array_keys($request->all()));
        $valueRepo = $valueRepo->getFindValue($request->all() , $attributeRepo->id);
        $createTags = $this->tagRepo->create($attributeRepo->id , $valueRepo->id);


        return response()->json(['ok'],200);
    }


    public function show($tag)
    {
        //
    }


    public function edit($tag)
    {
        //
    }

    public function update(UpdateTagRequest $request, $tag)
    {
        //
    }


    public function destroy(Tag $tag)
    {
        //
    }
}
