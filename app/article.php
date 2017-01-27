<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id' // temporary!!
    ];

    protected $dates = ['published_at'];

    /**
     * Articles published until now
     * 
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Articles published in the future
     * 
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>', Carbon::now());
    }

    /**
     * Set published_at as date object
     * 
     * @param [type] $date [description]
     */
    public function setPublishedAtAttribute($date) 
    {
    	// $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // date and time
    	$this->attributes['published_at'] = Carbon::parse($date); // date and time is midnight
    }

        /**
     * Get published_at as date object and formated
     * 
     * @param [type] $date [description]
     */
    public function getPublishedAtAttribute($date) 
    {
        return Carbon::parse($date)->format('Y-m-d'); // date and time is midnight
    }

    /**
     * An article is owned by a user.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current article.
     * 
     * @return Array
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('id');
    }

}
