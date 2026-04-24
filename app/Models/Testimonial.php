<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_position',
        'client_company',
        'content',
        'rating',
        'client_image',
        'is_featured',
        'is_active',
        'order'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    // Scope for featured testimonials
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for active testimonials
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered items
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Scope for high rating
    public function scopeHighRated($query, $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating);
    }

    // Accessor for client full info
    public function getClientInfoAttribute()
    {
        $info = $this->client_name;
        if ($this->client_position) {
            $info .= ' - ' . $this->client_position;
        }
        if ($this->client_company) {
            $info .= ' at ' . $this->client_company;
        }
        return $info;
    }
}