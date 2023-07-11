@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cashWallet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cash-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.id') }}
                        </th>
                        <td>
                            {{ $cashWallet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.user') }}
                        </th>
                        <td>
                            {{ $cashWallet->user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.amount') }}
                        </th>
                        <td>
                            {{ $cashWallet->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.type') }}
                        </th>
                        <td>
                            {{ $cashWallet->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.method') }}
                        </th>
                        <td>
                            {{ $cashWallet->method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.description') }}
                        </th>
                        <td>
                            {!! $cashWallet->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.receiver') }}
                        </th>
                        <td>
                            {{ $cashWallet->receiver }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.received_from') }}
                        </th>
                        <td>
                            {{ $cashWallet->received_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cashWallet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\CashWallet::STATUS_SELECT[$cashWallet->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cash-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection