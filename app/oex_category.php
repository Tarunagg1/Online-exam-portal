<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oex_category extends Model
{
    protected $table = "oex_categories";
    protected $primaryKey = "id";
    protected $fillable = ['name','status'];
}
