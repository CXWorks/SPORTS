<?php

namespace SPORTS;

use Illuminate\Database\Eloquent\Model;

class JoinContest extends Model
{
    //
    protected $table='join_contests';
    protected $fillable=['contest_id','email','contest_date'];
}
