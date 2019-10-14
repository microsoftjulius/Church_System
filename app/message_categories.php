<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_categories extends Model
{
    //
     protected $fillable = ['id','message_id','user_id','church_id','category'];
}
