<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    protected $table='records';
    protected $fillable=['email','minute','sports','word'];

}
