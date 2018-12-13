<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MensagemController extends BaseController
{

    /**
     * MensagemController constructor.
     * Define o Model do Controller.
     */
    public function __construct()
    {
        $this->model = new Mensagem();
    }

    public function store(Request $request){

        try {

            // 1. Busca o remetente da mensagem
            if ($request->id_usuario_remetente) {

                $remetente = Usuario::find($request->id_usuario_remetente);

                if (!$remetente) {
                    throw new \Exception("Por favor, informe um remetente válido.");
                }

            } else {
                throw new \Exception("Por favor, informe um id_usuario_remetente.");
            }

            // 2. Busca o destinatário da mensagem
            if ($request->id_usuario_destinatario) {

                $destinatario = Usuario::find($request->id_usuario_destinatario);

                if (!$destinatario) {
                    throw new \Exception("Por favor, informe um destinatário válido.");
                }

            } else {
                throw new \Exception("Por favor, informe um id_usuario_destinatario.");
            }

            // 3. Se encontrou o remetente, o destinatário e a
            // mensagem não é nula, então salva no banco.

            if (!$request->texto) {
                throw new \Exception("Por favor, informe um texto para a mensagem.");
            }

            $mensagem = $this->model->fill([
                'id_usuario_remetente'      => $request->id_usuario_remetente,
                'id_usuario_destinatario'   => $request->id_usuario_destinatario,
                'data_hora'                 => Carbon::now(),
                'texto'                     => $request->texto,
            ]);

            $mensagem->save();

            return json_encode($mensagem);

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
