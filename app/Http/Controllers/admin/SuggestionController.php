<?php

namespace App\Http\Controllers\admin;

use App\DataTables\SuggestionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSuggestionRequest;
use App\Models\Suggestion;
use App\Models\SuggestionCategory;
use App\Repositories\Admin\SuggestionRepository;

class SuggestionController extends Controller
{
    protected $repository;

    protected $suggestioncategories;

    public function __construct(SuggestionRepository $repository)
    {
        $this->repository = $repository;
        $this->suggestioncategories = new SuggestionCategory();
    }

    /**
    * Display a listing of the resource.
    */
    public function index(SuggestionDataTable $repository)
    {
        return $this->repository->index($repository);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->suggestioncategories->all();

        return view('admin.suggestion.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSuggestionRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        $categories = $this->suggestioncategories->all();

        return view('admin.suggestion.edit', ['suggestion' => $suggestion, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSuggestionRequest $request, Suggestion $suggestion)
    {
        return $this->repository->update($request, $suggestion->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suggestion $suggestion)
    {
        return $this->repository->destroy($suggestion);
    }
}
