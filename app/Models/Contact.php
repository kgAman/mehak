<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'phone',
        'email',
        'map_embed_url',
        'business_hours',
        'contact_form_enabled',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin'
    ];

    protected $casts = [
        'contact_form_enabled' => 'boolean'
    ];

    // Get the active contact information (usually the first/latest)
    public static function getActive()
    {
        return self::latest()->first();
    }

    // Get social media links as array
    public function getSocialLinksAttribute()
    {
        return array_filter([
            'facebook' => $this->social_facebook,
            'twitter' => $this->social_twitter,
            'instagram' => $this->social_instagram,
            'linkedin' => $this->social_linkedin,
        ]);
    }

    // Check if social media exists
    public function hasSocialLinks()
    {
        return !empty($this->getSocialLinksAttribute());
    }

    // Get formatted phone number
    public function getFormattedPhoneAttribute()
    {
        // You can customize phone formatting here
        return $this->phone;
    }
}