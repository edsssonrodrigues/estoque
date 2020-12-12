<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $table = 'produtos';
    public $timestamps = false;
    protected $fillable = ['nome', 'valor', 'descricao', 'quantidade'];
}
