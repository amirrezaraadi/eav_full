<?php

namespace App\Repository;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class valueRepo
{
    public function index()
    {
        return Value::query()->get();
    }

    public function create($data)
    {
        return Value::query()->create([
            'value' => $data->value,
            'attribute_id' => $data->attribute_id,
        ]);
    }

    public function getFindValue($data, $attribute)
    {
        $valueId = Value::query()->where('value', $data[$attribute->title])->first();
        if (is_null($valueId))
            return Value::query()->create([
                'value' => $data[$attribute->title],
                'attribute_id' => $attribute->id
        ]);
        return $valueId;
    }

    public function getCreateMultiValue($data, array $attributes)
    {
        $createdValues = [];
        foreach ($attributes as $attribute) {
            $valueIds = Value::whereIn('value', array_values($data))->get('id');
            if ($valueIds->isEmpty()) {
                foreach ($data as $data) {
                    $createdValue = Value::query()->create([
                        'value' => $data,
                        'attribute_id' => $attribute->id
                    ]);
                    $createdValues[] = $createdValue;
                }
            } else {
                $createdValues[] = $valueIds;
            }
        }
        return $createdValues;


        //        $createdvalues = [];
//        foreach ($attributes as $attribute) {
//            $valueId = Value::query()->where('value', $data)->first();
//            if (is_null($valueId)) {
//                $createValue = Value::query()->create([
//                    'value' => $data,
//                    'attribute_id' => $attribute->id
//                ]);
//                $createdvalues[] = $createValue;
//            }else {
//                $createdvalues[] = $valueId;
//            }
//
//
//            return $createdvalues;
//        }


        //        $created = [];
//        foreach ($attributes as $attribute) {
//            $valueId = Value::query()->where('value', $data)->first();
//            if (is_null($valueId)) {
//                $createValue = Value::query()->create([
//                    'value' => $data,
//                    'attribute_id' => $attribute->id
//                ]);
//                $created[] = $createValue;
//            }else {
//                $created[] = $valueId;
//            }
//            return $created;
//        }
    }

}
