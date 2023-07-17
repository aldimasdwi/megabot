<?php

namespace App\Repositories\Admin;

use App\DataTables\SuggestionDataTable;
use App\Models\Suggestion;
use Exception;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class SuggestionRepository extends BaseRepository
{
    protected $fields = [
        'question',
        'suggestion_category_id',
    ];

    public function model()
    {
        return Suggestion::class;
    }

    public function index(SuggestionDataTable $dataTable)
    {
        return $dataTable->render('admin.suggestion.index');
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $this->model->create([
                'question' => $request->question,
                'suggestion_category_id' => $request->suggestion_category_id,
            ]);

            DB::commit();

            return redirect()->route('suggestion.index')->with('message', __('static.response.suggestion_created_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            $this->model->find($id)->update($request->all());
            DB::commit();

            return redirect()->route('suggestion.index')->with('message', __('static.response.suggestion_updated_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Suggestion $suggestion)
    {
        DB::beginTransaction();
        try {

            $this->model->destroy($suggestion->id);
            DB::commit();

            return redirect()->route('suggestion.index')->with('message', __('static.response.suggestion_deleted_successfully'));
        } catch (Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
