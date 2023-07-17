<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CharacterDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCharacterRequest;
use App\Models\Character;
use App\Repositories\Admin\CharacterRepository;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    protected $repository;

    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

     public function index(CharacterDataTable $repository)
     {
         return $this->repository->index($repository);
     }

     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('admin.character.create')->with('message', 'Character added Successfully');
     }

     /**
      * Store a newly created resource in storage.
      */
     public function store(CreateCharacterRequest $request)
     {
         return $this->repository->store($request);
     }

     /**
      * Display the specified resource.
      */
     public function show(Character $Character)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Character $character)
     {
         return view('admin.character.edit', ['character' => $character]);
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, $id)
     {
         return $this->repository->update($request, $id);
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         return $this->repository->destroy($id);
     }
}
