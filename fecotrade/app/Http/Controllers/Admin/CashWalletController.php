<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\CashWallet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CashWalletController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cash_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cashWallets = CashWallet::where('method','Deposit')->get();

        return view('admin.cashWallets.index', compact('cashWallets'));
    }

    public function show(CashWallet $cashWallet)
    {
        abort_if(Gate::denies('cash_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cashWallets.show', compact('cashWallet'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cash_wallet_create') && Gate::denies('cash_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CashWallet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
