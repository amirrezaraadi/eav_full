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
}
