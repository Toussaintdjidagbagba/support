<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierarchie extends Model
{
    use HasFactory;
    public function incidents()
    {
        return $this->hasMany(Incident::class, 'hierarchie');
    }
}