<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\ChatHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $user;

    private $character;

    private $chathistory;

    /**
     * Show Admin Dashboard
     */
    public function __construct(User $user, Character $character, ChatHistory $chathistory)
    {
        $this->user = $user;
        $this->character = $character;
        $this->chathistory = $chathistory;
    }

    public function index()
    {
        return view(
            'admin.dashboard.index',
            [
                'userCounts' => $this->getUserCountsByDayOfWeek(),
                'total_users' => $this->user->where('role', '!=', 'admin')->count(),
                'character_list' => $this->character->get(),
                'total_characters' => $this->character->count(),
                'recent_users' => $this->user->latest()->where('role', '<>', 'admin')->take(5)->get(),
                'chatData' => $this->getlatestchats(),
            ]
        );
    }

    public function getUserCountsByDayOfWeek()
    {
        return $this->user->selectRaw('DAYNAME(created_at) as day_of_week, COUNT(*) as total_users')
            ->whereNotIn('role', ['admin'])
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day_of_week')
            ->get();
    }

    public function getlatestchats()
    {
        return $this->chathistory->select('message_at', DB::raw('COUNT(*) as chat_count'))
            ->whereBetween('message_at', [Carbon::now()->startOfMonth()->subDays(9)->startOfDay(), Carbon::now()->endOfDay()])
            ->groupBy('message_at')
            ->orderBy('message_at')
            ->limit(10)
            ->get();
    }
}
