<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends BaseController
{

    /**
     * MensagemController constructor.
     * Define o Model do Controller.
     */
    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function store(Request $request){

        try {

            $usuario = $this->model->fill([
                'login' => $request->login,
                'senha' => $request->senha,
            ]);

            $usuario->save();

            return json_encode($usuario);

        } catch (\Exception $e) {

            return [
                'error' => [
                    'code'      => 1,
                    'error'     => $e->getMessage(),
                    'message'   => 'Não foi possível inserir o usuário.'
                ]
            ];

        }

    }

}
