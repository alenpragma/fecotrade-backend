<?php

namespace App\Http\Requests;

use App\Models\LevelSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLevelSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('level_setting_edit');
    }

    public function rules()
    {
        return [
            'level_1' => [
                'numeric',
                'required',
            ],
            'level_2' => [
                'numeric',
                'required',
            ],
            'level_3' => [
                'numeric',
                'required',
            ],
            'level_4' => [
                'numeric',
                'required',
            ],
            'level_5' => [
                'numeric',
                'required',
            ],
            'level_6' => [
                'numeric',
                'required',
            ],
            'level_7' => [
                'numeric',
                'required',
            ],
            'level_8' => [
                'numeric',
                'required',
            ],
            'level_9' => [
                'numeric',
                'required',
            ],
            'level_10' => [
                'numeric',
                'required',
            ],
            'level_11' => [
                'numeric',
                'required',
            ],
            'level_12' => [
                'numeric',
                'required',
            ],
            'level_13' => [
                'numeric',
                'required',
            ],
            'level_14' => [
                'numeric',
                'required',
            ],
            'level_15' => [
                'numeric',
                'required',
            ],
            'level_16' => [
                'numeric',
                'required',
            ],
            'level_17' => [
                'numeric',
                'required',
            ],
            'level_18' => [
                'numeric',
                'required',
            ],
            'level_19' => [
                'numeric',
                'required',
            ],
            'level_20' => [
                'numeric',
                'required',
            ],
        ];
    }
}
