<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =  [
        'studentName',
         'age',
        ];
/**
     * The factory instance for this model.
     *
     * @return \Database\Factories\StudentFactory
     */
    protected static function newFactory()
    {
        return \Database\Factories\StudentFactory::new();
    }
}
