<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table ="category";
    protected $fillable = ['id','message_id','user_id','church_id','category'];
}
