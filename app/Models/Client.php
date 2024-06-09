<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =  [
    'clientname',
     'phone',
     'email',
     'website',
     'city_id',
     'address',
     'active',
     'image',
    ];

    public function curCity(){
        return $this->belongsTo(City::class,'city_id');
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
