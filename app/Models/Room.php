<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'ready' => 'string',
    ];

    // protected $attributes = [
    //     'width' => "Blank",
    //     'height' => "Blank",
    //     'length' => "Blank",
    //     'ffff' => "Blank",
    // ];

    protected $hidden = ["deleted_at"];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
