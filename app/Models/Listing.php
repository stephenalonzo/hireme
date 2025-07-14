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

    public function scopeFilter($query, array $filters)
    {
        if ($filters['job'] ?? false) {
            $query->join('companies', 'listings.company_id', '=', 'companies.id')
                ->select('companies.*', 'listings.*')
                ->where('listings.job_title', 'like', '%' . request('job') . '%')
                ->orWhere('listings.job_description', 'like', '%' . request('job') . '%')
                ->orWhere('listings.job_category', 'like', '%' . request('job') . '%')
                ->orWhere('listings.uid', 'like', '%' . request('job') . '%')
                ->orWhere('companies.company_name', 'like', '%' . request('job') . '%');
        }

        if ($filters['job_category'] ?? false) {
            $query->where('job_category', 'like', '%' . request('job_category') . '%');
        }

        if ($filters['job_type'] ?? false) {
            $query->where('job_type', 'like', '%' . request('job_type') . '%');
        }
    }

    protected $casts = [
        'work_hours' => 'array',
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
