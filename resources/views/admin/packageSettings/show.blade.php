@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.packageSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.package-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $packageSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.package_name') }}
                        </th>
                        <td>
                            {{ $packageSetting->package_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.image') }}
                        </th>
                        <td>
                            @if($packageSetting->image)
                                <a href="{{ $packageSetting->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $packageSetting->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.price') }}
                        </th>
                        <td>
                            {{ $packageSetting->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.total_roi') }}
                        </th>
                        <td>
                            {{ $packageSetting->total_roi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.daily_roi') }}
                        </th>
                        <td>
                            {{ $packageSetting->daily_roi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.validity') }}
                        </th>
                        <td>
                            {{ $packageSetting->validity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packageSetting.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PackageSetting::STATUS_SELECT[$packageSetting->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.package-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection