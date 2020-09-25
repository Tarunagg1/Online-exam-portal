<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oex_portal extends Model
{
    protected $table = "oex_portals";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobileno','password','status'];
}
