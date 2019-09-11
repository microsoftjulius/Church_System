<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
    protected $fillable =['group_id','message','contact_character','created_on','church_id','created_by'];
}
