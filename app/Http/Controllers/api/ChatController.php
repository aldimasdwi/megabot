<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateChatHistoryRequest;
use App\Repositories\Eloquents\ChatRepository;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $repository;

    public function __construct(ChatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveChatHistory(CreateChatHistoryRequest $request)
    {
        return $this->repository->saveChatHistory($request);
    }

    public function getChatHistory(Request $request)
    {
        return $this->repository->getChatHistory($request);
    }

    public function coins(Request $request)
    {
        return $this->repository->coins($request);
    }

    public function clearChatHistory(Request $request)
    {
        return $this->repository->clearChatHistory($request);
    }

    public function clearChatSession($session_id)
    {
        return $this->repository->clearChatSession($session_id);
    }

    public function clearUserChatSessions(Request $request)
    {
        return $this->repository->clearUserChatSessions($request);
    }
}
