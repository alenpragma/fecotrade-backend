@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.levelSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.level-settings.update", [$levelSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="level_1">{{ trans('cruds.levelSetting.fields.level_1') }}</label>
                <input class="form-control {{ $errors->has('level_1') ? 'is-invalid' : '' }}" type="number" name="level_1" id="level_1" value="{{ old('level_1', $levelSetting->level_1) }}" step="0.01" required>
                @if($errors->has('level_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_2">{{ trans('cruds.levelSetting.fields.level_2') }}</label>
                <input class="form-control {{ $errors->has('level_2') ? 'is-invalid' : '' }}" type="number" name="level_2" id="level_2" value="{{ old('level_2', $levelSetting->level_2) }}" step="0.01" required>
                @if($errors->has('level_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_3">{{ trans('cruds.levelSetting.fields.level_3') }}</label>
                <input class="form-control {{ $errors->has('level_3') ? 'is-invalid' : '' }}" type="number" name="level_3" id="level_3" value="{{ old('level_3', $levelSetting->level_3) }}" step="0.01" required>
                @if($errors->has('level_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_4">{{ trans('cruds.levelSetting.fields.level_4') }}</label>
                <input class="form-control {{ $errors->has('level_4') ? 'is-invalid' : '' }}" type="number" name="level_4" id="level_4" value="{{ old('level_4', $levelSetting->level_4) }}" step="0.01" required>
                @if($errors->has('level_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_5">{{ trans('cruds.levelSetting.fields.level_5') }}</label>
                <input class="form-control {{ $errors->has('level_5') ? 'is-invalid' : '' }}" type="number" name="level_5" id="level_5" value="{{ old('level_5', $levelSetting->level_5) }}" step="0.01" required>
                @if($errors->has('level_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_6">{{ trans('cruds.levelSetting.fields.level_6') }}</label>
                <input class="form-control {{ $errors->has('level_6') ? 'is-invalid' : '' }}" type="number" name="level_6" id="level_6" value="{{ old('level_6', $levelSetting->level_6) }}" step="0.01" required>
                @if($errors->has('level_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_7">{{ trans('cruds.levelSetting.fields.level_7') }}</label>
                <input class="form-control {{ $errors->has('level_7') ? 'is-invalid' : '' }}" type="number" name="level_7" id="level_7" value="{{ old('level_7', $levelSetting->level_7) }}" step="0.01" required>
                @if($errors->has('level_7'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_7') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_7_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_8">{{ trans('cruds.levelSetting.fields.level_8') }}</label>
                <input class="form-control {{ $errors->has('level_8') ? 'is-invalid' : '' }}" type="number" name="level_8" id="level_8" value="{{ old('level_8', $levelSetting->level_8) }}" step="0.01" required>
                @if($errors->has('level_8'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_8') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_8_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_9">{{ trans('cruds.levelSetting.fields.level_9') }}</label>
                <input class="form-control {{ $errors->has('level_9') ? 'is-invalid' : '' }}" type="number" name="level_9" id="level_9" value="{{ old('level_9', $levelSetting->level_9) }}" step="0.01" required>
                @if($errors->has('level_9'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_9') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_9_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_10">{{ trans('cruds.levelSetting.fields.level_10') }}</label>
                <input class="form-control {{ $errors->has('level_10') ? 'is-invalid' : '' }}" type="number" name="level_10" id="level_10" value="{{ old('level_10', $levelSetting->level_10) }}" step="0.01" required>
                @if($errors->has('level_10'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_10') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_10_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_11">{{ trans('cruds.levelSetting.fields.level_11') }}</label>
                <input class="form-control {{ $errors->has('level_11') ? 'is-invalid' : '' }}" type="number" name="level_11" id="level_11" value="{{ old('level_11', $levelSetting->level_11) }}" step="0.01" required>
                @if($errors->has('level_11'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_11') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_11_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_12">{{ trans('cruds.levelSetting.fields.level_12') }}</label>
                <input class="form-control {{ $errors->has('level_12') ? 'is-invalid' : '' }}" type="number" name="level_12" id="level_12" value="{{ old('level_12', $levelSetting->level_12) }}" step="0.01" required>
                @if($errors->has('level_12'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_12') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_12_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_13">{{ trans('cruds.levelSetting.fields.level_13') }}</label>
                <input class="form-control {{ $errors->has('level_13') ? 'is-invalid' : '' }}" type="number" name="level_13" id="level_13" value="{{ old('level_13', $levelSetting->level_13) }}" step="0.01" required>
                @if($errors->has('level_13'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_13') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_13_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_14">{{ trans('cruds.levelSetting.fields.level_14') }}</label>
                <input class="form-control {{ $errors->has('level_14') ? 'is-invalid' : '' }}" type="number" name="level_14" id="level_14" value="{{ old('level_14', $levelSetting->level_14) }}" step="0.01" required>
                @if($errors->has('level_14'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_14') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_14_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_15">{{ trans('cruds.levelSetting.fields.level_15') }}</label>
                <input class="form-control {{ $errors->has('level_15') ? 'is-invalid' : '' }}" type="number" name="level_15" id="level_15" value="{{ old('level_15', $levelSetting->level_15) }}" step="0.01" required>
                @if($errors->has('level_15'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_15') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_15_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_16">{{ trans('cruds.levelSetting.fields.level_16') }}</label>
                <input class="form-control {{ $errors->has('level_16') ? 'is-invalid' : '' }}" type="number" name="level_16" id="level_16" value="{{ old('level_16', $levelSetting->level_16) }}" step="0.01" required>
                @if($errors->has('level_16'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_16') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_16_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_17">{{ trans('cruds.levelSetting.fields.level_17') }}</label>
                <input class="form-control {{ $errors->has('level_17') ? 'is-invalid' : '' }}" type="number" name="level_17" id="level_17" value="{{ old('level_17', $levelSetting->level_17) }}" step="0.01" required>
                @if($errors->has('level_17'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_17') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_17_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_18">{{ trans('cruds.levelSetting.fields.level_18') }}</label>
                <input class="form-control {{ $errors->has('level_18') ? 'is-invalid' : '' }}" type="number" name="level_18" id="level_18" value="{{ old('level_18', $levelSetting->level_18) }}" step="0.01" required>
                @if($errors->has('level_18'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_18') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_18_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_19">{{ trans('cruds.levelSetting.fields.level_19') }}</label>
                <input class="form-control {{ $errors->has('level_19') ? 'is-invalid' : '' }}" type="number" name="level_19" id="level_19" value="{{ old('level_19', $levelSetting->level_19) }}" step="0.01" required>
                @if($errors->has('level_19'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_19') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_19_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level_20">{{ trans('cruds.levelSetting.fields.level_20') }}</label>
                <input class="form-control {{ $errors->has('level_20') ? 'is-invalid' : '' }}" type="number" name="level_20" id="level_20" value="{{ old('level_20', $levelSetting->level_20) }}" step="0.01" required>
                @if($errors->has('level_20'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_20') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.level_20_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.levelSetting.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\LevelSetting::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $levelSetting->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.levelSetting.fields.status_helper') }}</span>
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