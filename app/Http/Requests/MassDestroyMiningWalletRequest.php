<?php

namespace App\Http\Requests;

use App\Models\MiningWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMiningWalletRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mining_wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mining_wallets,id',
        ];
    }
}
