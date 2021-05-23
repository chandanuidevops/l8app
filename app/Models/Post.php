<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table='post';
    // protected $primaryKey="user_id";
    protected $guarded=[];
   
    public function user(Type $var = null)
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function profile(Type $var = null)
    {
        return $this->hasOneThrough(Userprofile::class,User::class,'id','user_id','user_id','id');
    } 
    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_posts','post_id','category_id','id','id');
    }
    public function setSlugAttribute($val)
    {
        $slug = trim(preg_replace("/[^\w\d]+/i","-",$val),"-");
        $count=Post::where('slug','like',"%${slug}%")->count();
        if($count>0){
            $slug=$slug."-".($count+1);
        }
       $this->attributes['slug']=strtolower($slug);
    }
    public function getSlugAttribute($val)
    {
       if($val==null){
        return $this->id;
       }
       return $val;
    }
}
