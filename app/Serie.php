<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // se for usar o create no Controller:
    protected $fillable = ['name'];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
