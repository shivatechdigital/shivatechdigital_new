<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_badge',
        'page_title',
        'page_subtitle',
        'years_experience',
        'projects_delivered',
        'team_members_count',
        'section_label',
        'section_title',
        'lead_text',
        'description',
        'about_image',
        'highlight_1_icon',
        'highlight_1_title',
        'highlight_1_text',
        'highlight_2_icon',
        'highlight_2_title',
        'highlight_2_text',
        'highlight_3_icon',
        'highlight_3_title',
        'highlight_3_text',
        'founder_label',
        'founder_name',
        'founder_title',
        'founder_image',
        'founder_message',
        'mission_text',
        'vision_text',
        'cta_title',
        'cta_subtitle',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}