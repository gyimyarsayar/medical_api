<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmistist extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'performance', 'work_exp', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
