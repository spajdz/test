<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
	/* Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    	return User::all();
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function getSpecific($id)
    {
    	$usuario = User::find($id);
    	if( $usuario != null)
    		return $usuario;
    	else
    		return "Ese chigüire no ta";
    }

    public function store(Request $request)
    {
    	$params = $request->all();
    	if (!is_array($params)) {
            return ['error' => 'request must be an array'];
        }
        // Creamos las reglas de validación
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'gender'	=> 'required',
            'password'  => 'required'
            ];
        try {
            // Se llama al validador pa ver q este lo pedido en rules
            // en caso de que no se retorna el error con lo que falta
            $validator = \Validator::make($params, $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }
            // Si todo esta bien se guarda el usuario
            User::create($params);
            return ['created' => true];
        } catch (Exception $e) {
            // Si no esta bien se manda el json de que algo ta mal y no se guardo.
            \Log::info('Error creating user: '.$e);
            return \Response::json(['created' => false, 'status'=> "No se guardo"], 500);
        }
    }

    public function update(Request $request, $id)
    {
    	$user = User::find($id);
    	try {
		    $user->update($request->all());
		    return "Se actualizo fino";
		} catch(Exception $e) {
		  	\Log::info('Error creating user: '.$e);
		    return \Response::json(['updated' => false, 'status' => "fallo el betanol"], 500);
		}
        
    }


}
