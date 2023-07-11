<?php

namespace App\Http\Requests;

use App\Models\GeneralSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGeneralSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('general_setting_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'logo' => [
                'required',
            ],
            'favicon' => [
                'required',
            ],
            'company_address' => [
                'required',
            ],
            'contact_email' => [
                'required',
            ],
            'contact_no' => [
                'string',
                'required',
            ],
            'currency_name' => [
                'string',
                'required',
            ],
            'currency_symbol' => [
                'string',
                'required',
            ],
        ];
    }
}
