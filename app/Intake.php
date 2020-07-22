<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    protected $dates = ['dueDate', 'intakeDate',];
    protected $fillable = [
        'projectName',
        'submittedBy',
        'requestType',
        'updateName',
        'contactEmail',
        'fcid',
        'sme',
        'stakeholder',
        'scope',
        'dueDate',
        'submittedBy',
        'stakeholder',
        'projectScope',
        'performMetric',
        'whyUpdate',
        'regions',
        'isNew',
        'attach',
    ];
}
