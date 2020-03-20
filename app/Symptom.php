<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Symptom extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'detail', 'first_appear', 'level'];

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }
    public function diseases()
    {
        return $this->belongsToMany('App\Disease');
    }
}
