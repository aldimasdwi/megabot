<?php

namespace App\Repositories\Admin;

use App\DataTables\CharacterDataTable;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 */
class CharacterRepository extends BaseRepository
{
    protected $fields = [
        'name',
        'image_url',
        'shadow_color',
    ];

    public function model()
    {
        return Character::class;
    }

    public function index(CharacterDataTable $dataTable)
    {
        return $dataTable->render('admin.character.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        DB::beginTransaction();

        try {

            $character = $this->model->create([
                'name' => $request->name,
                'shadow_color' => $request->shadow_color,
            ]);

            if ($request->file('character_image')) {
                $media = $character->addMediaFromRequest('character_image')->toMediaCollection('character_image');
                $character->image_url = $media->getFullUrl();
                $character->save();
            }

            DB::commit();

            return redirect()->route('character.index')->with('message', __('static.response.character_added_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        return view('admin.character.edit', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            $character = $this->model->find($id);

            if ($request->file('character_image')) {
                $media = $character->addMediaFromRequest('character_image')->toMediaCollection('character_image');
                $character->image_url = $media->getFullUrl();
                $character->save();
            }
            $this->model->findOrFail($id)->update($request->all());

            DB::commit();

            return redirect()->route('character.index')->with('message', __('static.response.character_updated_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $this->model->destroy($id);

            DB::commit();

            return redirect()->route('character.index')->with('message', __('static.response.character_deleted_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }
}
