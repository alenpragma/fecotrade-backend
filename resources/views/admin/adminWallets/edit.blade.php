@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.adminWallet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.admin-wallets.update", [$adminWallet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="wallet_name">{{ trans('cruds.adminWallet.fields.wallet_name') }}</label>
                <input class="form-control {{ $errors->has('wallet_name') ? 'is-invalid' : '' }}" type="text" name="wallet_name" id="wallet_name" value="{{ old('wallet_name', $adminWallet->wallet_name) }}" required>
                @if($errors->has('wallet_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wallet_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminWallet.fields.wallet_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="wallet_no">{{ trans('cruds.adminWallet.fields.wallet_no') }}</label>
                <input class="form-control {{ $errors->has('wallet_no') ? 'is-invalid' : '' }}" type="text" name="wallet_no" id="wallet_no" value="{{ old('wallet_no', $adminWallet->wallet_no) }}" required>
                @if($errors->has('wallet_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wallet_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminWallet.fields.wallet_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.adminWallet.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AdminWallet::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $adminWallet->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.adminWallet.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection