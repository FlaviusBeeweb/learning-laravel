<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title',
      'body',
      'published_at',
      'user_id'
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query){
        $query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date){
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * An Article is owned by a User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute(){
        return $this->tags->pluck('id');
    }
}
