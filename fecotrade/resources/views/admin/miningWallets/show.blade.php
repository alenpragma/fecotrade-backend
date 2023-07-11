@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.miningWallet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mining-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.id') }}
                        </th>
                        <td>
                            {{ $miningWallet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.user') }}
                        </th>
                        <td>
                            {{ $miningWallet->user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.amount') }}
                        </th>
                        <td>
                            {{ $miningWallet->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.type') }}
                        </th>
                        <td>
                            {{ $miningWallet->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.method') }}
                        </th>
                        <td>
                            {{ $miningWallet->method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.description') }}
                        </th>
                        <td>
                            {!! $miningWallet->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.receiver') }}
                        </th>
                        <td>
                            {{ $miningWallet->receiver }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.received_from') }}
                        </th>
                        <td>
                            {{ $miningWallet->received_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.miningWallet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\MiningWallet::STATUS_SELECT[$miningWallet->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mining-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection