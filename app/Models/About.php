<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'mission',
        'vision',
        'image',
        'years_of_experience',
        'completed_projects',
        'happy_clients',
        'is_active'
    ];

    protected $casts = [
        'years_of_experience' => 'integer',
        'completed_projects' => 'integer',
        'happy_clients' => 'integer',
        'is_active' => 'boolean'
    ];

    // Scope for active about content
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get the latest active about content
    public static function getActive()
    {
        return self::where('is_active', true)->latest()->first();
    }

    // Accessor for statistics array
    public function getStatisticsAttribute()
    {
        return [
            'years_of_experience' => $this->years_of_experience,
            'completed_projects' => $this->completed_projects,
            'happy_clients' => $this->happy_clients,
        ];
    }
}