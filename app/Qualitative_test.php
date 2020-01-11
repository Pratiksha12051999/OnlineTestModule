<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualitative_test extends Model
{
    protected $table='qualitative_analysis';
    protected $primaryKey = 'uniq_id';
    public $incrementing = false;
    //protected $primaryKey = ['qid', 'setid'];
    
}
