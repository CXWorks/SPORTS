<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comment";
    protected $fillable = ['email','content'];
    public  $email;
    public $content;
    
}
