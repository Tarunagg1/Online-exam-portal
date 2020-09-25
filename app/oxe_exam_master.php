<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oxe_exam_master extends Model
{
    protected $table = "oxe_exam_masters";
    protected $primaryKey = "id";
    protected $fillable = ['title','category','exam_date','status'];
    
}
