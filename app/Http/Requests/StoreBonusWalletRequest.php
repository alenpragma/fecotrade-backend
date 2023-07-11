<?php

namespace App\Http\Requests;

use App\Models\BonusWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBonusWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bonus_wallet_create');
    }

    public function rules()
    {
        return [
            'user' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
            'method' => [
                'string',
                'required',
            ],
            'receiver' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'received_from' => [
                'string',
                'nullable',
            ],
        ];
    }
}
