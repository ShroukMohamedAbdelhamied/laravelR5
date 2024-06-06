<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =  [
    'clientname',
     'phone',
     'email',
     'website',
     'City',
     'address',
     'active',
     'image',
    ];
/**
     * The factory instance for this model.
     *
     * @return \Database\Factories\ClientFactory
     */
    protected static function newFactory()
    {
        return \Database\Factories\ClientFactory::new();
    }
}
