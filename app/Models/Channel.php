<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'channel_tb';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['sid', 'channel', 'broadcaster', 'lcn', 'lcnhex'];

    public function lcnRelation()
    {
        return $this->belongsTo(Lcn::class, 'lcn', 'lcn');
    }

    public function sidInfo()
    {
        return $this->belongsTo(Sid::class, 'sid', 'sid');
    }
}
