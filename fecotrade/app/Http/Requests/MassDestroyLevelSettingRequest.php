<?php

namespace App\Http\Requests;

use App\Models\LevelSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLevelSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('level_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:level_settings,id',
        ];
    }
}
