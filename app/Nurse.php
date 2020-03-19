<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nurse extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'performance' , 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
