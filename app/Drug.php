<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'detail', 'prise'];

    public function sideeffects()
    {
        return $this->belongsToMany('App\SideEffect', 'drug_side_effect');
    }
    public function treatments()
    {
        return $this->belongsToMany('App\Treatment');
    }
}
