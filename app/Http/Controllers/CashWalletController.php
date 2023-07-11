<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashWallet;
use Auth;
use App\Models\Purchase;
class CashWalletController extends Controller
{
    public function index()
    {
        $cashwallet_history = CashWallet::where('method','Deposit')->where('user_id',Auth::user()->id)->get();

        return view('users.cashwallet.index', compact('cashwallet_history'));
    }
    public function store(Request $request)
    {
        //dd($request);
         $deposit = new CashWallet();

    $deposit->user_id = Auth::id();
    $deposit->amount = $request->amount;
    //$deposit->method=$method;
    $deposit->wallet_id= $request->wallet_id;

    $deposit->method = 'Deposit';
    $deposit->type = 'Credit';
    $deposit->status = 'pending';
    $deposit->description= 'Requested Deposit amount '.$request->amount. ' from '.Auth::user()->user_name;
    $deposit->txn_id = $request->txn_id;
    $deposit->save();

      return back()->with('Money_added', 'Successfully Added Funds. Waiting for the Confirmation!!');
    }
    
    public function approve($id)
    {
        $deposit = CashWallet::find($id);
        $deposit->status = 'approved';
        $deposit->save();
        return back()->with('Money_added', 'Approved. Successfully approved add fund request!!');
    }
     
    public function reject($id)
    {
        $deposit = CashWallet::find($id);
        $deposit->status = 'rejected';
        $deposit->save();
        return back()->with('Money_rejected', 'Rejected. Successfully rejected add fund request!!');
    }
    public function myAsset()
    {
        $assets = Purchase::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        
         return view('users.cashwallet.my_asset', compact('assets'));
    }
}
