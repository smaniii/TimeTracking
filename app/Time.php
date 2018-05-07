<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $fillable = ['hoursBilled', 'hoursWorked','developer_id','project_id'];
}
