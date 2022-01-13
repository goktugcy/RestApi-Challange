<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use Carbon\Carbon;
use App\Models\User;
use Validator;
class AuthController extends Controller
{
    public $successStatus = 200;



public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'last_name' => 'required|string',
        'company_name' => 'required|string',
        'site_url' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string',
    ]);

    $user = new User([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'company_name' => $request->company_name,
        'site_url' => $request->site_url,
        'email' => $request->email,
        'password' => bcrypt($request->password),   //BCRYPT İLE PAROLA ŞİFRELENEREK DB'YE KAYIT EDİLİYOR.
    ]);
    $token = $user->createToken('Kobisei')->accessToken; 
    $user->save();

    $message['success'] = 'Kullanıcı Başarıyla Oluşturuldu'; //DÖNEN MESAJ 

    return response()->json([
        'message' => $message,
        'token' => $token
    ],201);
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string'
    ]);

    $credentials = request(['email','password']);

    if(Auth::attempt($credentials))
    {
        $user = Auth::user();
        $message['token'] = $user->createToken('Kobisi')->accessToken;
        $message['token_type'] = 'Bearer';
        $message['experies_at'] = Carbon::parse(Carbon::now()->addWeeks(1))->toDateTimeString();
        $message['success'] = 'Kullanıcı Girişi Başarılı!'; 

        return response()->json(['message' => $message], $this->successStatus);
    }
    else{
        return response()->json(['error'=>'Unauthorised'],401); //GİRİŞ HATALI
    }
    }
}
