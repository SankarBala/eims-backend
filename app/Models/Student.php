<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function guardians(){
        return $this->belongsToMany(Guardian::class)->withPivot('can_pick');
    }
}
