<?php

namespace App\Repositories\Admin;

use App\DataTables\ChatHistoriesDataTable;
use App\Models\ChatHistory;
use Prettus\Repository\Eloquent\BaseRepository;

class ChatHistoriesRepository extends BaseRepository
{
    protected $fields = [
        'user_id',
        'message',
        'response',
        'message_at',
        'session_id',
        'response_at',
        'character_id',
    ];

    public function model()
    {
        return ChatHistory::class;
    }

    public function index(ChatHistoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.chathistories.index');
    }
}
