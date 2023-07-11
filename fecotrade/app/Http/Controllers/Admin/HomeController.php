<?php

namespace App\Http\Controllers\Admin;
use App\Models\CashWallet;
use App\Models\MiningWallet;
use App\Models\BonusWallet;
use Auth;

class HomeController
{
    public function index()
    {
        $data['cash_wallet']= CashWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $data['bonus_wallet']= BonusWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $data['mining_wallet']= MiningWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        return view('home',compact('data'));
    }
    
    
}
