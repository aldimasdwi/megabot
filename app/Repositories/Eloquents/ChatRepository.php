<?php

namespace App\Repositories\Eloquents;

use App\Exceptions\ExceptionHandler;
use App\Models\ChatHistory;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class ChatRepository extends BaseRepository
{
    protected $fields = [
        'coins',
        'user_id',
        'message',
        'response',
        'message_at',
        'session_id',
        'response_at',
        'character_id',
    ];

    private $user;

    public function model()
    {
        $this->user = new User();

        return ChatHistory::class;
    }

    public function saveChatHistory($request)
    {
        try {
            $user = $this->user->where('id', $request->input('user_id'))
                ->first();

            if (!$user) {
                throw new Exception('User not found', 422);
            }

            if ($user->coins <= 0) {
                throw new Exception('No coins. Please purchase a plan.', 422);
            }

            $this->model->create([
                'session_id' => $request->input('session_id'),
                'message' => $request->input('message'),
                'user_id' => $request->input('user_id'),
                'response' => $request->input('response'),
                'message_at' => $request->input('message_at'),
                'response_at' => $request->input('response_at'),
                'character_id' => $request->input('character_id'),
            ]);

            return [
                'message' => 'Chat history saved successfully',
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function coins($request)
    {
        $user = $this->user->where('id', Auth::user()->id)->first();

        return $user->update($request->all());
    }

    public function getChatHistory($request)
    {
        return $this->model
            ->with('character')
            ->where('user_id', auth()->user()->id)
            ->orderBy('response_at', 'desc')
            ->get()
            ->groupBy('session_id')
            ->map(function ($chathistories) {
                $recentChatHistory = $chathistories->first();

                return [
                    'id' => $recentChatHistory->session_id,
                    'session' => $chathistories->map(function ($chathistory) {
                        return [
                            'character_url' => $chathistory->character->image_url,
                            'character_name' => $chathistory->character->name,
                            'character_id' => $chathistory->character->id,
                            'message' => $chathistory->message,
                            'message_at' => $chathistory->message_at,
                            'response' => $chathistory->response,
                            'response_at' => $chathistory->response_at,
                            'session_id' => $chathistory->session_id,
                        ];
                    })->values()->all(),
                ];
            })->values()->all();
    }

    public function clearChatHistory($request)
    {
        try {
            $this->model->where('user_id', auth()->user()->id)->delete();

            return [
                'message' => 'Chat history cleared successfully',
                'success' => true,
            ];
        } catch (Exception $e) {

            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function clearChatSession($session_id)
    {
        try {
            $this->model->where('user_id', auth()->user()->id)
                ->where('session_id', $session_id)
                ->delete();

            return [
                'message' => 'Chat cleared successfully',
                'success' => true,
            ];
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function clearUserChatSessions($request)
    {
        try {
            if (!is_array($request->input('session_ids', []))) {
                throw new Exception('Invalid session_ids parameter. Expected an array.', 400);
            }

            $this->model->where('user_id', auth()->user()->id)
                ->whereIn('session_id', $request->input('session_ids', []))
                ->delete();

            return [
                'message' => 'Chat sessions cleared successfully',
                'success' => true,
            ];
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
