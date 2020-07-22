<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'created_at', 'dueDate', 'intakeDate',];
    protected $fillable = [
        'title',
        'body',
        'attachment',
        'slug',
        'meta_title',
        'meta_desc',
        'status',
        'user_id',
        'scope',
        'dueDate',
        'submittedBy',
        'stakeholder',
        'isComplete',
        'isReview',
        'performMetric', // Add to migration
        'fcid',
        'whatUpdate',
        'describe',
        'requestType',
        'intakeDate',
        'sme'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
