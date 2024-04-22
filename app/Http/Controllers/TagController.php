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

    public function __construct(public tagRepo $tagRepo)
    {
    }

    public function index()
    {
        return $this->tagRepo->index();
    }

//    public function store(StoreTagRequest $request, attributeRepo $attributeRepo, valueRepo $valueRepo)
//    {
//        $attributeRepo = $attributeRepo->getfindId(array_keys($request->all()));
//        $valueRepo = $valueRepo->getFindValue($request, $attributeRepo);
//        dd($attributeRepo->id, $valueRepo->id);
//        $this->tagRepo->create($attributeRepo , $valueRepo->id);
//        return response()->json(['ok'], 200);
//    }
    public function store(StoreTagRequest $request, attributeRepo $attributeRepo, valueRepo $valueRepo)
    {
        $attributeRepo = $attributeRepo->multiFind(array_keys($request->all()));
        $valueRepo = $valueRepo->getCreateMultiValue($request->all(), $attributeRepo);
        $this->tagRepo->createTwo($attributeRepo , $valueRepo);
        return response()->json(['ok'], 200);
    }


    public function show($tag)
    {
        return $this->tagRepo->getFindId($tag);
    }

    public function update(UpdateTagRequest $request, $tag , attributeRepo $attributeRepo, valueRepo $valueRepo)
    {
        $attributeRepo = $attributeRepo->getfindId(array_keys($request->all()));
        $valueRepo = $valueRepo->getFindValue($request->all(), $attributeRepo->id);

        $this->tagRepo->update($tag , $attributeRepo->id, $valueRepo->id);
        return response()->json( ['ok'] , 200);
    }


    public function destroy($tag)
    {
        $deleted  = $this->tagRepo->delete($tag);
            if($deleted === 0 ) return response()->json(['not found id'],200);
        return response()->json(['ok'],200);
    }
}
