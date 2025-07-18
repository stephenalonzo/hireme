<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_logo',
        'company_name',
        'company_website',
        'company_email',
        'company_phone',
        'company_address',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['company'] ?? false) {
            $query->where('company_name', 'like', '%' . request('company') . '%');
        }
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
