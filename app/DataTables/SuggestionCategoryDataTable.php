<?php

namespace App\DataTables;

use App\Models\SuggestionCategory;
use Yajra\DataTables\Services\DataTable;

class SuggestionCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  mixed  $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                return view('admin.inc.action', [
                    'edit' => 'category.edit',
                    'delete' => 'category.destroy',
                    'data' => $row,
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SuggestionCategory $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('suggestioncategory-table')
            ->addColumn(['data' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'title' => 'Action'])
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters(['stateSave' => true]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'SuggestionCategory_' . date('YmdHis');
    }
}
