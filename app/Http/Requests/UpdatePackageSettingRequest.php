<?php

namespace App\Http\Requests;

use App\Models\PackageSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackageSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_setting_edit');
    }

    public function rules()
    {
        return [
            'package_name' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
            'price' => [
                'numeric',
                'min:0',
            ],
            'total_roi' => [
                'numeric',
                'required',
            ],
            'daily_roi' => [
                'numeric',
                'required',
            ],
            'validity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
             'no_of_levels' => [
                'required',
                'integer',
               
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
