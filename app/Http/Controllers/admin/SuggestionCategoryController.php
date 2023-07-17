<?php

namespace App\Http\Controllers\admin;

use App\DataTables\SuggestionCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSuggestionCategoryRequest;
use App\Http\Requests\UpdateSuggestionCategoryRequest;
use App\Models\SuggestionCategory;
use App\Repositories\Admin\SuggestionCategoryRepository;

class SuggestionCategoryController extends Controller
{
    protected $repository;

    public function __construct(SuggestionCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SuggestionCategoryDataTable $repository)
    {
        return $this->repository->index($repository);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suggestioncategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSuggestionCategoryRequest $request)
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
    public function edit(SuggestionCategory $category)
    {
        return view('admin.suggestioncategory.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuggestionCategoryRequest $request, SuggestionCategory $category)
    {
        return $this->repository->update($request, $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuggestionCategory $category)
    {
        return $this->repository->destroy($category);
    }
}
