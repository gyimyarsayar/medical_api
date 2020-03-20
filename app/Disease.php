<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'detail'];

    public function symptoms()
    {
        return $this->belongsToMany('App\Symptom');
    }
}
