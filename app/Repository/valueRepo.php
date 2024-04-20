<?php

namespace App\Repository ;
use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Support\Str;

class valueRepo
{
    public function index()
    {
        return Value::query()->get();
    }

    public function create($data)
    {
        return Value::query()->create([
            'value' => $data->value ,
            'attribute_id' => $data->attribute_id ,
        ]);
    }

    public function getFindValue($data , $attribute_id)
    {
        $valueId =  Value::query()->where('value' , $data)->first();
        if( is_null( $valueId ) ) return Value::query()->create([
            'value' => $data['tags'] ,
            'attribute_id' => $attribute_id
        ]);
        return $valueId;
    }
}
