<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creative_test extends Model
{
    protected $table='creative_test';
    protected $primaryKey = 'uniq_id';
    public $incrementing = false;
}
