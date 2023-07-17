<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SuggestionCategory;

class SuggestionController extends Controller
{
    public function suggestionsByCategory()
    {
        $categories = SuggestionCategory::with('questions')->get();
        return $categories;
    }
}
