<?php

namespace App\Http\Controllers\api;

use App\User;

use Illuminate\Http\Request;
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


}
