@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.generalSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.general-settings.update", [$generalSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.generalSetting.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $generalSetting->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.generalSetting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="favicon">{{ trans('cruds.generalSetting.fields.favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('favicon') ? 'is-invalid' : '' }}" id="favicon-dropzone">
                </div>
                @if($errors->has('favicon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('favicon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_address">{{ trans('cruds.generalSetting.fields.company_address') }}</label>
                <textarea class="form-control {{ $errors->has('company_address') ? 'is-invalid' : '' }}" name="company_address" id="company_address" required>{{ old('company_address', $generalSetting->company_address) }}</textarea>
                @if($errors->has('company_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.company_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_email">{{ trans('cruds.generalSetting.fields.contact_email') }}</label>
                <input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $generalSetting->contact_email) }}" required>
                @if($errors->has('contact_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_no">{{ trans('cruds.generalSetting.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $generalSetting->contact_no) }}" required>
                @if($errors->has('contact_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_name">{{ trans('cruds.generalSetting.fields.currency_name') }}</label>
                <input class="form-control {{ $errors->has('currency_name') ? 'is-invalid' : '' }}" type="text" name="currency_name" id="currency_name" value="{{ old('currency_name', $generalSetting->currency_name) }}" required>
                @if($errors->has('currency_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.currency_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_symbol">{{ trans('cruds.generalSetting.fields.currency_symbol') }}</label>
                <input class="form-control {{ $errors->has('currency_symbol') ? 'is-invalid' : '' }}" type="text" name="currency_symbol" id="currency_symbol" value="{{ old('currency_symbol', $generalSetting->currency_symbol) }}" required>
                @if($errors->has('currency_symbol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency_symbol') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.generalSetting.fields.currency_symbol_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.general-settings.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($generalSetting) && $generalSetting->logo)
      var file = {!! json_encode($generalSetting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.general-settings.storeMedia') }}',
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
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($generalSetting) && $generalSetting->favicon)
      var file = {!! json_encode($generalSetting->favicon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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