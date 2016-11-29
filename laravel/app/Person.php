<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table="people";
    protected $fillable = ['email','run','swim','basketball','football','boxing','info','body'];
}
