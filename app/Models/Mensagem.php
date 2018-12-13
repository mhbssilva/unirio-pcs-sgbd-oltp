<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{

    protected $table = 'mensagem';

    protected $fillable = [
        'id_usuario_remetente',
        'id_usuario_destinatario',
        'data_hora',
        'texto'
    ];

}


?>