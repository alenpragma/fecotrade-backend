@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.packageSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.package-settings.update", [$packageSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="package_name">{{ trans('cruds.packageSetting.fields.package_name') }}</label>
                <input class="form-control {{ $errors->has('package_name') ? 'is-invalid' : '' }}" type="text" name="package_name" id="package_name" value="{{ old('package_name', $packageSetting->package_name) }}" required>
                @if($errors->has('package_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.package_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.packageSetting.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.packageSetting.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $packageSetting->price) }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_roi">{{ trans('cruds.packageSetting.fields.total_roi') }}</label>
                <input class="form-control {{ $errors->has('total_roi') ? 'is-invalid' : '' }}" type="number" name="total_roi" id="total_roi" value="{{ old('total_roi', $packageSetting->total_roi) }}" step="0.01" required>
                @if($errors->has('total_roi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_roi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.total_roi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="daily_roi">{{ trans('cruds.packageSetting.fields.daily_roi') }}</label>
                <input class="form-control {{ $errors->has('daily_roi') ? 'is-invalid' : '' }}" type="number" name="daily_roi" id="daily_roi" value="{{ old('daily_roi', $packageSetting->daily_roi) }}" step="0.01" required>
                @if($errors->has('daily_roi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('daily_roi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.daily_roi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="validity">{{ trans('cruds.packageSetting.fields.validity') }}</label>
                <input class="form-control {{ $errors->has('validity') ? 'is-invalid' : '' }}" type="number" name="validity" id="validity" value="{{ old('validity', $packageSetting->validity) }}" step="1" required>
                @if($errors->has('validity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.validity_helper') }}</span>
            </div>
             <div class="form-group">
                <label class="required" for="validity">No. Of Levels</label>
                <input class="form-control {{ $errors->has('no_of_levels') ? 'is-invalid' : '' }}" type="number" name="no_of_levels" id="no_of_levels" value="{{ old('no_of_levels', $packageSetting->no_of_levels) }}" step="1" required>
                @if($errors->has('no_of_levels'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_levels') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.validity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.packageSetting.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PackageSetting::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $packageSetting->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packageSetting.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.package-settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 100,
      height: 100
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($packageSetting) && $packageSetting->image)
      var file = {!! json_encode($packageSetting->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection