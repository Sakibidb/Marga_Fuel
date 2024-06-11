<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    protected $fillable = [
        'name', 'mobile', 'email', 'address', 'image', 'title', 'hotline', 'banner1',
        'banner2','banner3', 'websitelink', 'facebooklink', 'youtubeink', 'googletag', 'cantactbackground', 'bangla_company_name'
        // Add other attributes here as needed
    ];
}
