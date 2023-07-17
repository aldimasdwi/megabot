<?php

namespace App\DataTables;

use App\Models\User;
use Collective\Html\HtmlFacade;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            })->addColumn('status', function ($row) {
                return view('admin.inc.action', [
                    'status' => 'admin.user.edit',
                    'data' => $row,
                ]);
            })
            ->addColumn('action', function ($row) {
                return view('admin.inc.action', [
                    'edit' => 'user.edit',
                    'delete' => 'user.destroy',
                    'data' => $row,
                ]);
            })
            ->addColumn('avatar', function ($row) {
                return HtmlFacade::image($row->profile_image_url ? $row->profile_image_url : 'admin/images/avatar/profile.jpg');
            })
            ->filter(function ($query) {
                $query->where('role', '!=', 'admin');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('user-table')
            ->addColumn(['data' => 'avatar', 'title' => 'Avatar'])
            ->addColumn(['data' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'phone', 'title' => 'Phone'])
            ->addColumn(['data' => 'status', 'title' => 'Status'])
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
        return 'User_' . date('YmdHis');
    }
}
