<?php

namespace App\Repository;

use App\Models\Tag;
use Database\Seeders\TagSeeder;

class tagRepo
{
    public function index()
    {
        return Tag::query()->get();
    }

    public function create($attr , $value)
    {
        $data = [$attr, $value];
        $jsonData = json_encode($data);
        return Tag::query()->create([
            'attr' => $jsonData ,
        ]);
    }

    public function getFindId($id)
    {
        return Tag::query()->where('id' , $id)->first();
    }

    public function update($id , $attr , $value)
    {
        $data = [$attr, $value];
        $jsonData = json_encode($data);
        return Tag::query()->where('id' , $id)->update([
            'attr' => $jsonData ,
        ]);
    }

    public function delete($id)
    {
        return Tag::query()->where('id' , $id)->delete();
    }

    public function createTwo($attributes, $values)
    {
        $attributeIds = [];
        foreach ($attributes as $attribute) {
            $attributeIds[] = $attribute->id;
        }

        $valueIds = [];
        foreach ($values as $value) {
            $valueIds[] = $value->id;
        }

        $tags = [];
        foreach ($attributes as $key => $attribute) {
            $tags[] = [$attributeIds[$key], $valueIds[$key]];
        }

//        $existingTag = Tag::where('attr', json_encode($tags))->first();
//        if ($existingTag) {
//            return $existingTag;
//        }
        return Tag::create([
            'attr' => json_encode($tags),
        ]);
    }

}
