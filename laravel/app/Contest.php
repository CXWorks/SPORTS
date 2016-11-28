<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    //
    protected $table='contests';
    protected $fillable=['publisher','pub_email','state','date','description'];
}
