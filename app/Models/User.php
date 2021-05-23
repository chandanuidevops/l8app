<?php

namespace App\Models;

use App\Models\Role;
use App\Models\UserProfile;
use App\Models\Post;
use App\Scopes\NotVerifiedUsers;
use App\Scopes\VerifiedUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Parent_;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // protected $primaryKey='email';
    // protected $keyType='string';
    // public $incrementing=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static function boot(Type $var = null)
    // {
    //     Parent::boot();
    //     static::addGlobalScope(new VerifiedUsers);
    //     static::addGlobalScope(new NotVerifiedUsers);
    // }

    public function scopeVfu($query)
    {
        return $query->where('email_verified_at','<>',null);
    }
    public function scopeNvfu($query)
    {
        return $query->where('email_verified_at','=',null);
    }
    public function scopeFindById($query,$id)
    {
        return $query->where('id',$id);
    }
    public function profile(Type $var = null)
    {
        return $this->hasOne(UserProfile::class,'user_id','id');
    }
    public function posts(Type $var = null)
    {
        return $this->hasMany(Post::class,'user_id','id');
    }
    public function roles(Type $var = null)
    {
       return $this->belongsToMany(Role::class,'role_user','user_id','role_id','id');
    }
    public function setUsernameAttribute($val)
    {
        $username = trim(preg_replace("/[^\w\d]+/i","",$val)," ");
        $count=User::where('username','like',"%${username}%")->count();
        if($count>0){
            $username=$username."-".($count+1);
        }
       $this->attributes['username']=strtolower($username);
    }
  
}
