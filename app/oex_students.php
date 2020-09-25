<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oex_students extends Model
{
    protected $table = "oex_students";
    protected $primaryKey = "id";
    protected $fillable =['name','email','number','dob','exam','password','status'];
}
