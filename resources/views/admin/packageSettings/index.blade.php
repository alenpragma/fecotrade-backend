@extends('layouts.admin')
@section('content')
@can('package_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.package-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.packageSetting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.packageSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PackageSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.package_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.total_roi') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.daily_roi') }}
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.validity') }}
                        </th>
                        <th>
                            No Of Levels
                        </th>
                        <th>
                            {{ trans('cruds.packageSetting.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packageSettings as $key => $packageSetting)
                        <tr data-entry-id="{{ $packageSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $packageSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $packageSetting->package_name ?? '' }}
                            </td>
                            <td>
                                @if($packageSetting->image)
                                    <a href="{{ $packageSetting->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $packageSetting->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $packageSetting->price ?? '' }}
                            </td>
                            <td>
                                {{ $packageSetting->total_roi ?? '' }}
                            </td>
                            <td>
                                {{ $packageSetting->daily_roi ?? '' }}
                            </td>
                            <td>
                                {{ $packageSetting->validity ?? '' }}
                            </td>
                            <td>
                                {{ $packageSetting->no_of_levels ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PackageSetting::STATUS_SELECT[$packageSetting->status] ?? '' }}
                            </td>
                            <td>
                                @can('package_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.package-settings.show', $packageSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('package_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.package-settings.edit', $packageSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('package_setting_delete')
                                    <form action="{{ route('admin.package-settings.destroy', $packageSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('package_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.package-settings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PackageSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection