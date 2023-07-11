<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BonusWallet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BonusWalletController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bonus_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bonusWallets = BonusWallet::all();

        return view('admin.bonusWallets.index', compact('bonusWallets'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bonus_wallet_create') && Gate::denies('bonus_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BonusWallet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
