<?php

namespace App\Http\Requests;

use App\Models\AdminWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdminWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admin_wallet_edit');
    }

    public function rules()
    {
        return [
            'wallet_name' => [
                'string',
                'required',
            ],
            'wallet_no' => [
                'string',
                'required',
            ],
        ];
    }
}
