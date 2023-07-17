<?php

namespace App\DataTables;

use App\Models\Suggestion;
use Yajra\DataTables\Services\DataTable;

class SuggestionDataTable extends DataTable
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
            ->addColumn('suggestion_category', function ($row) {
                return $row->category->name;
            })
            ->addColumn('action', function ($row) {
                return view('admin.inc.action', [
                    'edit' => 'suggestion.edit',
                    'delete' => 'suggestion.destroy',
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
    public function query(Suggestion $model)
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
            ->setTableId('suggestion-table')
            ->addColumn(['data' => 'suggestion_category', 'title' => 'Suggestion Category'])
            ->addColumn(['data' => 'question', 'title' => 'Question'])
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
        return 'Suggestion_' . date('YmdHis');
    }
}
