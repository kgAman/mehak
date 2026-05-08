<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'timeline',    // Added
        'crew',        // Added
        'status',      // Added
        'description',
        'project_url',
        'completion_date',
        'order',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'completion_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    // Scope for featured items
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for active items
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered items
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Scope by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}