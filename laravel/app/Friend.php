<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected $table='friends';
    protected $fillable=['semail','temail','sname','tname'];
}
