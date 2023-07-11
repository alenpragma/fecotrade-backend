@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bonusWallet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bonus-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.id') }}
                        </th>
                        <td>
                            {{ $bonusWallet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.user') }}
                        </th>
                        <td>
                            {{ $bonusWallet->user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.amount') }}
                        </th>
                        <td>
                            {{ $bonusWallet->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.type') }}
                        </th>
                        <td>
                            {{ $bonusWallet->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.method') }}
                        </th>
                        <td>
                            {{ $bonusWallet->method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.description') }}
                        </th>
                        <td>
                            {!! $bonusWallet->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.receiver') }}
                        </th>
                        <td>
                            {{ $bonusWallet->receiver }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.received_from') }}
                        </th>
                        <td>
                            {{ $bonusWallet->received_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bonusWallet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\BonusWallet::STATUS_SELECT[$bonusWallet->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bonus-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection