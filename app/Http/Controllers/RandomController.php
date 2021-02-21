<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RandomController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password , $user->password)) {
            return response()->json([
                'message'=>'Hauwezi',
            ]);
        }
        return response()->json([
            'user'=>$user,
            'token'=>'Bearer '.$user->createToken($_SERVER['REMOTE_ADDR'])->plainTextToken,
            'IP Address'=>$_SERVER['REMOTE_ADDR']
        ]);
    }
}
