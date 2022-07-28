<?php

namespace App\Models;

use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    public function formation ()
    {
        return $this->hasOne(Formation::class);
    }

    public function chapitres ()
    {
        return $this->hasMany(Chapitre::class);
    }
}
