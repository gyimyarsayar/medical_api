<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'guardian', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function symptoms()
    {
        return $this->belongsToMany('App\Symptom');
    }
}
