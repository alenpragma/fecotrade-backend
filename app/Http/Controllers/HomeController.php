<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BonusWallet;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function DailyBonus()
    {
        $transaction_history = BonusWallet::where('method', 'Daily Bonus')->where('user_id', Auth::user()->id)->get();

        return view('users.daily_bonus_history', compact('transaction_history'));
    }
    public function LevelBonus()
    {
        $transaction_history = BonusWallet::where('method', 'Level Bonus')->where('user_id', Auth::user()->id)->get();

        return view('users.level_bonus_history', compact('transaction_history'));
    }
    public function affilate_index()
    {
        $users = User::where('sponsor', Auth::id())->get();

        return view('admin.users.affilates', compact('users'));
    }
}
