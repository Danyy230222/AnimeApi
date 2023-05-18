<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class UserController extends Controller
{
    public function register(Request $request){
        $request ->validate(([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' =>'required|confirmed'
        ]));

        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);

        $user->save();

        return response()->json([
            "status" => "ok",
            "result" => "Registro Hecho"

        ]);
    }
    public function login(Request $request){
        $request ->validate(([
           
            'email'=> 'required|email',
            'password' =>'required'
        ]));

        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status" => "ok",
                    "result"=> array(
                        "msg" => "Usuario logueado exitosamente",
                        "token"=> $token
                    )
                    
        
                ]);
            }
            else{
                return response()->json([
                    "status" => "error",
                    "result" => array(
                        "error_id" => "400",
                        "error_msg" => "Contraseña incorrecta"
                    )
        
                ]);
            }
        }else{
            return response()->json([
                "status" => "error",
                "result" => array(
                    "error_id" => "200",
                    "error_msg" => "Correo no registrado"
                )
    
            ], 200);
        }
    }
    public function userProfile(){
        return response()->json([
            "status" => "ok",
            "msg" => "Acerca del perfil de usuario",
            "data"=> auth()->user()

        ]);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => "ok",
            "result" => array(
                "msg" => "Cierre de sesion exitoso"
            )
            

        ]);
    }
}
