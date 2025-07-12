<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_address',
        'applicant_resume'
    ];

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
