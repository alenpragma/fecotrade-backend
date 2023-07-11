@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.generalSetting.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.general-settings.update', '1') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="required" for="address">Address</label>
                            <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $generalSettings->company_name ?? '') }}">
                            @if ($errors->has('company_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">Company Address</label>
                            <input class="form-control {{ $errors->has('company_address') ? 'is-invalid' : '' }}" type="text" name="company_address" id="company_address" value="{{ old('company_address', $generalSettings->company_address ?? '') }}">
                            @if ($errors->has('company_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company_address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="contact_email">Company Email</label>
                            <input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email', $generalSettings->contact_email ?? '') }}">
                            @if ($errors->has('contact_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="contact_no">Contact No</label>
                            <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $generalSettings->contact_no ?? '') }}">
                            @if ($errors->has('contact_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_no') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="currency_name">Company Address</label>
                            <input class="form-control {{ $errors->has('currency_name') ? 'is-invalid' : '' }}" type="text" name="currency_name" id="currency_name" value="{{ old('currency_name', $generalSettings->currency_name ?? '') }}">
                            @if ($errors->has('currency_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="currency_symbol">Company Address</label>
                            <input class="form-control {{ $errors->has('currency_symbol') ? 'is-invalid' : '' }}" type="text" name="currency_symbol" id="currency_symbol" value="{{ old('currency_symbol', $generalSettings->currency_symbol ?? '') }}">
                            @if ($errors->has('currency_symbol'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency_symbol') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
