<?php

namespace App\Models;

use App\Models\Lecon;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapitre extends Model
{
    use HasFactory;

    public function module ()
    {
        return $this->hasOne(Module::class);
    }

    public function lecons ()
    {
        return $this->hasMany(Lecon::class);
    }
}
