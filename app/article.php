<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class article extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
        'user_id' // temporary!!
    ];
    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date) 
    {
    	// $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date); // date and time
    	$this->attributes['published_at'] = Carbon::parse($date); // date and time is midnight
    }

    /**
     * An article is owned by a user.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo [description]
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
