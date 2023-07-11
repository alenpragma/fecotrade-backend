@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.levelSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $levelSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_1') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_2') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_3') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_4') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_5') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_6') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_7') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_8') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_9') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_9 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_10') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_10 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_11') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_11 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_12') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_12 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_13') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_13 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_14') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_14 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_15') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_15 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_16') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_16 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_17') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_17 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_18') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_18 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_19') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_19 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_20') }}
                        </th>
                        <td>
                            {{ $levelSetting->level_20 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.levelSetting.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\LevelSetting::STATUS_SELECT[$levelSetting->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.level-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection