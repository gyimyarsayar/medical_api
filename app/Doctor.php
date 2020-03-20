<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'performance', 'work_exp', 'user_id'];
    public function expertises()
    {
        return $this->belongsToMany('App\Expertise');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
