@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.adminWallet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admin-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.adminWallet.fields.id') }}
                        </th>
                        <td>
                            {{ $adminWallet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminWallet.fields.wallet_name') }}
                        </th>
                        <td>
                            {{ $adminWallet->wallet_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminWallet.fields.wallet_no') }}
                        </th>
                        <td>
                            {{ $adminWallet->wallet_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.adminWallet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\AdminWallet::STATUS_SELECT[$adminWallet->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admin-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection