<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oxe_question_master extends Model
{
    protected $table = "oxe_question_masters";
    protected $primaryKey = "id";
    protected $fillable = ['exam_id','question','ans','option','status'];
}
