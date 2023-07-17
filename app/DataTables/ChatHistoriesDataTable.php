<?php

namespace App\DataTables;

use App\Models\ChatHistory;
use Collective\Html\HtmlFacade;
use Yajra\DataTables\Services\DataTable;

class ChatHistoriesDataTable extends DataTable
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
            ->addColumn('user_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('character_url', function ($row) {
                return HtmlFacade::image($row->character->image_url);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ChatHistory $model)
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
            ->setTableId('chathistories-table')
            ->addColumn(['data' => 'character_url', 'title' => 'Character'])
            ->addColumn(['data' => 'user_name', 'title' => 'User Name'])
            ->addColumn(['data' => 'message', 'title' => 'Message'])
            ->addColumn(['data' => 'response', 'title' => 'Response'])
            ->addColumn(['data' => 'message_at', 'title' => 'Message_at'])
            ->addColumn(['data' => 'response_at', 'title' => 'Response_at'])
            ->addColumn(['data' => 'session_id', 'title' => 'Session Id'])
            ->addColumn(['data' => 'created_at', 'title' => 'Created At'])
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
        return 'ChatHistory_' . date('YmdHis');
    }
}
