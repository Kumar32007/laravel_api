<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/setup', function () {
    $credentials = [
        'email'=>'admin@sadmin.com',
        'password'=>'password'
    ];

    if(!Auth::attempt($credentials)){
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if(Auth::attempt($credentials)){
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create','update','delete']);
            $updateToken = $user->createToken('update-token', ['create','update']);
            $basicToken = $user->createToken('basic-token',['basic']);

            return [
                'admin'=>$adminToken->plainTextToken,
                'update'=>$updateToken->plainTextToken,
                'basic'=>$basicToken->plainTextToken
            ];
        }
    }
    else {
    return 'User already exists and is authenticated.';
}
});