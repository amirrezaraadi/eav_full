<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repository\attributeRepo;
use App\Repository\categoryRepo;
use App\Repository\valueRepo;

class CategoryController extends Controller
{
    public function __construct(public categoryRepo $categoryRepo){}

    public function index()
    {
        return $this->categoryRepo->index();
    }

    public function store(StoreCategoryRequest $request , attributeRepo $attributeRepo, valueRepo $valueRepo)
    {
        $attributeRepo = $attributeRepo->multiFind(array_keys($request->all()));
        $valueRepo = $valueRepo->getCreateMultiValue($request->all(), $attributeRepo);
        $this->categoryRepo->create($attributeRepo , $valueRepo);
        return response()->json(['ok'] ,200);
    }


    public function show( $category)
    {
        //
    }


    public function edit( $category)
    {
        //
    }


    public function update(UpdateCategoryRequest $request,  $category)
    {
        //
    }


    public function destroy( $category)
    {
        //
    }
}
