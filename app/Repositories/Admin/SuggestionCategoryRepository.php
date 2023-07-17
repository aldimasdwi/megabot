<?php

namespace App\Repositories\Admin;

use App\DataTables\SuggestionCategoryDataTable;
use App\Models\SuggestionCategory;
use Exception;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class SuggestionCategoryRepository extends BaseRepository
{
    protected $fields = [
        'name',
    ];

    public function model()
    {
        return SuggestionCategory::class;
    }

    public function index(SuggestionCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.suggestioncategory.index');
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $this->model->create([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('category.index')->with('message', __('Suggestion Category Created Successfully'));
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

            return redirect()->route('category.index')->with('message', __('static.response.suggestion_category_updated_successfully'));
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(SuggestionCategory $category)
    {
        DB::beginTransaction();
        try {

            $this->model->destroy($category->id);
            DB::commit();

            return redirect()->route('category.index')->with('message', __('static.response.suggestion_category_deleted_successfully'));
        } catch (Exception $e) {

            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
