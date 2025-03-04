<?php

namespace App\Job;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class JobQuestionReply extends Model
{
    //
    //Rent connection
    protected $connection = 'job';
    // Increment
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($mode) {
            $mode->id = str_replace("-", "", Uuid::generate(4));
        });
    }
    // mass fill
    protected $guarded = [];
    // Relationships
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function job_questions()
    {
        return $this->belongsTo(JobQuestion::class);
    }
}
