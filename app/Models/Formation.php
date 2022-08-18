<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Image;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    protected $fillable = [ 'name', 'prix' ];

    use HasFactory;

    public function modules ()
    {
        return $this->hasMany(Module::class);
    }

    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }

    public function image ()
    {
        return $this->hasOne(Image::class);
    }
}
