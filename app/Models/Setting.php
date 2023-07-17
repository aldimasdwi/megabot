<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, HasApiTokens, InteractsWithMedia;

    protected $casts = [
        'general_settings' => 'json',
        'ads_Settings' => 'json',
        'email_settings' => 'json',
        'update_popup_settings' => 'json',
    ];

    protected $fillable = [
        'general_settings',
        'ads_Settings',
        'email_settings',
        'update_popup_settings',
    ];
}
