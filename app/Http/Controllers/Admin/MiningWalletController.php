<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\MiningWallet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MiningWalletController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mining_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $miningWallets = MiningWallet::all();

        return view('admin.miningWallets.index', compact('miningWallets'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mining_wallet_create') && Gate::denies('mining_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MiningWallet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
