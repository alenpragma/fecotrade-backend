<?php

namespace App\Http\Requests;

use App\Models\PackageSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPackageSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('package_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:package_settings,id',
        ];
    }
}
