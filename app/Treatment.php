<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        "name",
        "detail",
        "first_therapy",
        "last_therapy",
        "stage",
        "patient_id"
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function drugs()
    {
        return $this->belongsToMany('App\Drug');
    }
}
