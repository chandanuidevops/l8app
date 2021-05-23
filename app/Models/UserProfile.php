<?php

namespace App\Models;

use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable = [
        'user_id',
        'city',
        'country_id',
        'photo',
        'phone',
    ];

    public function user(Type $var = null)
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    // public function country(Type $var = null)
    // {
    //     return $this->hasOneThrough(Country::class,UserProfile::class,'country_id','id','country_id','country_id');
    // }
    public function country(Type $var = null)
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

   
}
