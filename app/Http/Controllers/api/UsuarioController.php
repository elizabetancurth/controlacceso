<?php

namespace App\Http\Controllers\api;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
 
    public function listAll(Request $request)
    {
        try
        {
            $response = User::all();
            $statusCode = 200; // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404; // Not Found
        }

        return response()->json($response, $statusCode);
    }

    public function listOne(Request $request, $id)
    {
        try
        {
            $response = User::findOrFail($id);
            $statusCode = 200;  // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404;  // Not Found
        }

        return response()->json($response, $statusCode);
    }

    public function create(array $data)
    {
        Validator::make($data, [
            'codigo' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|max:4|confirmed',
        ]);

        try
        {
            $response = User::create([
                        'codigo' => $data['codigo'],
                        'nombres' => $data['nombres'],
                        'apellidos' => $data['apellidos'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'estado' => 'Activo',
            ]);
            $statusCode = 200; // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404;  // Not Found
        }

        return response()->json($response, $statusCode);
    }


}
