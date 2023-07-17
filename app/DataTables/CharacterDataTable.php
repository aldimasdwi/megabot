<?php

namespace App\DataTables;

use App\Models\Character;
use Collective\Html\HtmlFacade;
use Yajra\DataTables\Services\DataTable;

class CharacterDataTable extends DataTable
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
                if ($row->name == 'dino') {
                    return 'System Reserved';
                }

                return view('admin.inc.action', [
                    'edit' => 'character.edit',
                    'delete' => 'character.destroy',
                    'data' => $row,
                ]);
            })
            ->addColumn('shadow_color', function ($row) {
                return '<div class="color-picker-main"><span class="color-picker-preview" style="background-color: ' . $row->shadow_color . '"></span><h5>' . $row->shadow_color . '</h5> <div>';
            })
            ->rawColumns(['shadow_color'])
            ->addColumn('image', function ($row) {
                return HtmlFacade::image($row->image_url);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Character $model)
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
            ->setTableId('character-table')
            ->addColumn(['data' => 'image', 'title' => 'Image', 'orderable' => false, 'searchable' => false, 'exportable' => false])
            ->addColumn(['data' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'shadow_color', 'title' => 'Shadow Color'])
            ->addColumn(['data' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'title' => 'Action'])
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters(['stateSave' => true, 'rawColumns' => ['image', 'action']]);
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
        return 'Character_' . date('YmdHis');
    }
}
