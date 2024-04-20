<?php

namespace App\Repository;

use App\Models\Attribute;
use App\Models\User;
use App\Models\Value;
use Illuminate\Support\Str;

class attributeRepo
{

    public function index()
    {
        return Attribute::query()->get();
    }

    public function create($data)
    {
        return Attribute::query()->create([
            'title' => $data->title,
            'slug' => Str::slug($data->title),
        ]);
    }

    public function createUser($data, $attributes)
    {


//        foreach ($attributes as $attribute) {
//            Attribute::create(['title' => $attribute , 'slug' => Str::slug($attribute)]);
//
//        }
//        foreach ($data->all() as $attributeTitle => $value) {
//                $attribute = Attribute::where('title', $attributeTitle)->first();
//                if ($attribute) {
//                   Value::query()->create(['value' => $value , 'attribute_id' => $attribute->id ]);
//                }
//            }

        $dataItem = array_values($data->all());
        $values = Value::query()
            ->whereIn('value', $dataItem)
            ->with(['attribute' => function ($q) {
                return $q->pluck('id');
            }])
            ->get();
        $attributesValues = [];
        foreach ($values as $value) {
            $attributesValues[] = "{" . $value->attribute->id . "," . $value->id . "}";
        }

        $user = new User();
        $user->attr = $attributesValues;
        $user->save();
        return true;

    }

//        foreach ($attributes as $attribute) {
////            $attribute = Attribute::query()->where('title', $attribute)->get()->pluck('id');
//
//
//    }


    // ایجاد ویژگی‌ها


// ذخیره مقادیر و متصل کردن به ویژگی‌ها
//$data = [
//    'name' => 'amirreza',
//    'email' => 'amirreza@yahoo.com',
//    'password' => '123456789',
//];
//
//foreach ($data as $attributeTitle => $value) {
//    $attribute = Attribute::where('title', $attributeTitle)->first();
//    if ($attribute) {
//        $attribute->values()->create(['value' => $value]);
//    }
//}


//        dd($data->all(), $attributes);
//        $collection = collect($attributes);
//        dd($collection);
//        $attributeItem = Attribute::query()->whereIn('title', $collection)->get()->pluck('id')->toArray();
    public function getfindId($attr)
    {
        $attribute = Attribute::query()->where('title', $attr[0])->first();
        if (is_null($attribute)) return Attribute::query()->create(['title' =>  $attr[0], 'slug' => $attr[0]]);
        return $attribute;
    }

    public function multiFind(array $attrs)
    {
//        foreach ($attrs as $attr) {
//            $existingAttribute = Attribute::where('title', $attr)->first();
//
//            if (! $existingAttribute) {
//                Attribute::create([
//                    'title' => $attr,
//                    'slug' => $attr,
//                ]);
//            }
//            return  ;
//        }

        $createdAttributes = [];
        foreach ($attrs as $attr) {
            $existingAttribute = Attribute::where('title', $attr)->first();
            if (! $existingAttribute ) {
                $newAttribute = Attribute::create([
                    'title' => $attr,
                    'slug' => $attr,
                ]);
                $createdAttributes[] = $newAttribute;
            } else {
                $createdAttributes[] = $existingAttribute;
            }
        }
        return $createdAttributes;
    }
}
