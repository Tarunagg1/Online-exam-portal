<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oxe_result extends Model
{
    protected $table = 'oxe_results';
    protected $primaryKey = "id";
    protected $fillable = ['examid','userid','totalQ','writeQ','wrongQ','totalmark','Resultjson'];
}
