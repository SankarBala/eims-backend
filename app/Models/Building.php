<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
