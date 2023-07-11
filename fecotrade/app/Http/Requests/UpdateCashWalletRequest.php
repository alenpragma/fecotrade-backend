<?php

namespace App\Http\Requests;

use App\Models\CashWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCashWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cash_wallet_edit');
    }

    public function rules()
    {
        return [
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
