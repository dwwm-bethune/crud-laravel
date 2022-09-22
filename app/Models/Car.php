<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function name(): Attribute
    {
        return Attribute::make(function () {
            return $this->brand.' '.$this->model;
        });
    }

    public function getNameAttribute()
    {
        return $this->brand.' '.$this->model;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
