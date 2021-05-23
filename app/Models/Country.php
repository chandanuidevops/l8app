<?php

namespace App\Models;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guard=[];

    public function posts(Type $var = null)
    {
        return $this->hasManyThrough(Post::class,UserProfile::class,'country_id','user_id','id','user_id');
    }

    

    
}
