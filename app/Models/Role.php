<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model
{
    use HasFactory;
    // protected $guard=[];
    public function users(Type $var = null)
    {
       return $this->belongsToMany(User::class,'role_user','user_id','role_id','id','id');
    }
    public function getNameAttribute($role)
    {
        return strtolower($role);
    }
}
