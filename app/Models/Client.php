<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'clientname',
        'phone',
        'email',
        'website',
        'city_id', 
        'active',
        'image',
        'address',
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
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
