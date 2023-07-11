@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.generalSetting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.general-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.id') }}
                        </th>
                        <td>
                            {{ $generalSetting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.company_name') }}
                        </th>
                        <td>
                            {{ $generalSetting->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.logo') }}
                        </th>
                        <td>
                            @if($generalSetting->logo)
                                <a href="{{ $generalSetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $generalSetting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.favicon') }}
                        </th>
                        <td>
                            @if($generalSetting->favicon)
                                <a href="{{ $generalSetting->favicon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $generalSetting->favicon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.company_address') }}
                        </th>
                        <td>
                            {{ $generalSetting->company_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.contact_email') }}
                        </th>
                        <td>
                            {{ $generalSetting->contact_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.contact_no') }}
                        </th>
                        <td>
                            {{ $generalSetting->contact_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.currency_name') }}
                        </th>
                        <td>
                            {{ $generalSetting->currency_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.generalSetting.fields.currency_symbol') }}
                        </th>
                        <td>
                            {{ $generalSetting->currency_symbol }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.general-settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection