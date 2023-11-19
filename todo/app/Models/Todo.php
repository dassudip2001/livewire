<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /* The line `protected  = [];` in the `Todo` model is used to specify which attributes are
    not mass assignable. By setting it to an empty array, it means that all attributes are mass
    assignable. */
    protected $guarded = [];


    protected $fillable = [
        'name',
    ];
}
