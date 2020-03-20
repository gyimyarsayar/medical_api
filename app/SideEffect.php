<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SideEffect extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'detail', 'level'];

    public function drugs()
    {
        return $this->belongsToMany('App\Drug', 'drug_side_effect');
    }
}
