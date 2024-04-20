<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Value;

class categoryRepo
{
    public function index()
    {
        return Category::query()->paginate();
    }

    public function create($attributes , $value)
    {
        foreach ($attributes as $attribute){

        }





//        $data = json_encode([$value , $attribute]);
//        return Category::query()->create([
//            'attr' => 'asdas' ,
//            'user_id' => 1
//        ]);
    }
}
