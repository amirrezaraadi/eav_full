<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\User;
use App\Models\Value;
use App\Repository\attributeRepo;
use App\Repository\userRepo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $inputNames = array_keys($request->all());
        $user = new attributeRepo();
        $user->createUser($request, $inputNames);
        return response()->json(['ok'], 200);
    }

    public function test()
    {
//        $users = User::find(1);
//        $attrArray = $users->attr;
//        foreach ($attrArray as $attrString) {
////            $attrData = explode(',', $attrString);
////            dd($attrData);
//            $attrId = $attrString[1];
//            $attrValue = $attrString[1];
//            dd($attrId, $attrValue);
//        }
//        $users = User::find(1);
//        $attrArray = $users->attr;
//
//        $objectArray = collect($attrArray)->map(function ($item) {
//            $cleanedItem = trim($item, '{}');
//            $parts = explode(',', $cleanedItem);
//            $attribute = Attribute::query()->where('id' , $parts[0] )->get();
//            dd($attribute);
//        })->toArray();

        //
//        $objectArray = collect($attrArray)->map(function ($item) {
//            $cleanedItem = trim($item, '{}');
//            $parts = explode(',', $cleanedItem);
//            foreach ( $parts as $q ){
//                $attre = Attribute::query()->where('id' , $q)->first();
//                dd($attre);
//            }
//        })->toArray();



        $users = User::find(1);
        $attrArray = $users->attr;

        $firstNumbers = [];
        $firstNumbersValue = [];

        foreach ($attrArray as $item) {
            $cleanedItem = str_replace(['{', '}'], '', $item);
            $parts = explode(',', $cleanedItem);
            $firstNumber = $parts[0];
            $firstNumberValue = $parts[1];
            $firstNumbers[] = $firstNumber;
            $firstNumbersValue [] = $firstNumberValue;

        }

        return Attribute::query()->whereIn('id' , $firstNumbers)->get();
//        return Value::query()->whereIn('id' ,  $firstNumbersValue)->get();






    }
}
