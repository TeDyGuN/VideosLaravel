<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function categoria()
    {
      return $this->belongsTo('App\Categoria', 'id_categoria');

    }
}
