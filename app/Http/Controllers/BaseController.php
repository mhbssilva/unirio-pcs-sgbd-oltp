<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{

    /**
     * @var Model
     */
    protected $model;

    public function index(){

        try {

            return $this->model->get();

        } catch (\Exception $e) {

            return [
                'error' => [
                    'code'      => 1,
                    'error'     => $e->getMessage(),
                    'message'   => 'Não foi possível realizar a listagem.',
                ]
            ];

        }

    }

}
