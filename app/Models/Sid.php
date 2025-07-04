<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sid extends Model
{
    protected $connection = 'mysql';
    protected $table = 'sid_tb';
    protected $primaryKey = 'sid';
    public $timestamps = false;

    protected $fillable = ['sid', 'ts', 'freq', 'sidhex'];
}
