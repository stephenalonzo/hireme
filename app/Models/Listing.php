<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\ApplicationName;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'company_id',
        'job_title',
        'job_category',
        'opening_date',
        'closing_date',
        'location',
        'hourly_wage',
        'payment_frequency',
        'job_type',
        'work_hours',
        'work_days',
        'qualifications',
        'job_description'
    ];

    protected $casts = [
        'work_hours' => 'array'
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
