<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lcn extends Model
{
    protected $connection = 'mysql';
    protected $table = 'lcn_tb';
    protected $primaryKey = 'lcn';
    public $timestamps = false;

    protected $fillable = ['lcn', 'genre', 'lcnhex'];
}
