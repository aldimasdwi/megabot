<?php

namespace App\Http\Controllers\admin;

use App\DataTables\ChatHistoriesDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ChatHistoriesRepository;
use Illuminate\Http\Request;

class ChatHistoriesController extends Controller
{
    protected $repository;

    public function __construct(ChatHistoriesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * Display a listing of the resource.
    */
    public function index(ChatHistoriesDataTable $repository)
    {
        return $this->repository->index($repository);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}
