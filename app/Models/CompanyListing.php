<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'listing_id'
    ];

    protected $table = 'company_listing';
    public $timestamps = false;
}
