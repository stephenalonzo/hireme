<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantListing extends Model
{
    use HasFactory;

    public $table = 'applicant_listing';
    public $timestamps = false;

    protected $fillable = [
        'applicant_id',
        'listing_id'
    ];
}
