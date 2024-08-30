<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/setup",function(){
    $credentials = [
        'email' => 'admin@admin.com',
        'password'=>'password'
    ];
    if(!Auth::attempt($credentials)){ //check if user exists
            $user = new App\Models\User();

            $user->name = 'Admin';
            $user->email = $credentials['email'];
            $user->password = Hash::make($credentials['password']);

            $user->save();
            dump('User created successfully');
        };
    if(Auth::attempt($credentials)){
               $user = Auth::user();
                if($user instanceOf App\Models\User){
                
               $adminToken = $user->createToken('admin-token',['create','update','delete']);
               $updateToken = $user->createToken('update-token',['create','update']);
               $basicToken = $user->createToken('basic-token',[]);

               return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken
               ];

            }
     }
           
    


});
