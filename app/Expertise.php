<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expertise extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
