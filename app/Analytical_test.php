<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytical_test extends Model
{
    protected $table='analytical_test';
    protected $primaryKey = 'uniq_id';
    public $incrementing = false;
}
