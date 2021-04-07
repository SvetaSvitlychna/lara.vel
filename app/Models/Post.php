<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $dates =[
        "created_at",
        "updated_at",
        "deleted_at",
        "published_at"
    ];

    public function getDeletedAtColumn(){
        return 'deleted_at';
    }

    public function sluggable()    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable =[
        'title', 'status', 'category_id', 'user_id',
        'content', 'votes', 'cover'
    ];

    protected $guarded =['votes'];

    public function getTitleAttribute($value){
        return ucfirst($value);
    }
    public function setTitleAttribute($value){
        $this->attributes['title']= strtolower($value);
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
    public function getShortAttribute($value){
        return substr($this->content, 0, 70)."...";
    }
}
