<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(): View
    {
        $pass = bin2hex(random_bytes(5));
        return view('main', ['password' => $pass]);
    }

    /**
     * Общая информация о пользователях
     * @return \Illuminate\View\View
     */
    public function showUserList(): View
    {
        $users = DB::table('users')
            ->join('statuses', 'users.status_id', '=', 'statuses.id')
            ->select('users.*', 'statuses.display_name')
            ->orderBy('users.id')
            ->get();
        $statuses = Status::all();
        $statusCount = DB::table('users')
            ->join('statuses', 'users.status_id', '=', 'statuses.id')
            ->select('statuses.id', 'statuses.name', 'statuses.display_name', 'users.status_id', DB::raw('COUNT(*) as count'))
            ->groupBy('users.status_id')
            ->orderBy('statuses.id')
            ->get();

        return view("dashboard", [
            'users' => $users,
            'statuses' => $statuses,
            'statusCount' => $statusCount,
        ]);
    }

    /**
     * удаление выбранного пользователя
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $delId = (int) $request->get('users');
        $currentId = $request->user()->id;

        if ($delId !== $currentId) {
            User::where('id', $delId)->first()->delete();
        }

        return Redirect::route('dashboard');
    }

    /**
     * обновление статуса
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusChange(Request $request): RedirectResponse
    {
        $userId = $request->get('userId');
        $newStatus = $request->get('status');

        DB::table('users')
            ->where('id', '=', $userId)
            ->update(['status_id' => $newStatus]);

        return Redirect::route('dashboard');
    }
}
