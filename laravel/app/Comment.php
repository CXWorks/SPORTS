<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comments";
    protected $fillable = ['email','content'];
    
}
