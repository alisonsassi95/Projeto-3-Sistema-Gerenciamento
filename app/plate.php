<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plate extends Model
{
  
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'plates';
     protected $fillable = [
        'plate',
        'Veic_color',
        'Veic_model',
        'Veic_description',
        'people_id'

    ];
}
