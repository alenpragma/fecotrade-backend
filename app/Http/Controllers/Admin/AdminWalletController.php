<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminWalletRequest;
use App\Http\Requests\UpdateAdminWalletRequest;
use App\Models\AdminWallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminWalletController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminWallets = AdminWallet::all();

        return view('admin.adminWallets.index', compact('adminWallets'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_wallet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminWallets.create');
    }

    public function store(StoreAdminWalletRequest $request)
    {
        $adminWallet = AdminWallet::create($request->all());

        return redirect()->route('admin.admin-wallets.index');
    }

    public function edit(AdminWallet $adminWallet)
    {
        abort_if(Gate::denies('admin_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminWallets.edit', compact('adminWallet'));
    }

    public function update(UpdateAdminWalletRequest $request, AdminWallet $adminWallet)
    {
        $adminWallet->update($request->all());

        return redirect()->route('admin.admin-wallets.index');
    }

    public function show(AdminWallet $adminWallet)
    {
        abort_if(Gate::denies('admin_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminWallets.show', compact('adminWallet'));
    }
}
