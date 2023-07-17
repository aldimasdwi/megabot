<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'suggestion_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(SuggestionCategory::class, 'suggestion_category_id');
    }
}
