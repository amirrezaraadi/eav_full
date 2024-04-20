<?php

namespace App\Repository;

use App\Models\Category;

class categoryRepo
{
    public function index()
    {
        return Category::query()->paginate();
    }

    public function create($value , $attribute)
    {
        $data = json_encode([$value , $attribute]);
        return Category::query()->create([
            'attr' => 'asdas' ,
            'user_id' => 1
        ]);
    }
}
