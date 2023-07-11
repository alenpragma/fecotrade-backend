@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.levelSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LevelSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_5') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_6') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_7') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_8') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_9') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_10') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_11') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_12') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_13') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_14') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_15') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_16') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_17') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_18') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_19') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.level_20') }}
                        </th>
                        <th>
                            {{ trans('cruds.levelSetting.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($levelSettings as $key => $levelSetting)
                        <tr data-entry-id="{{ $levelSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $levelSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_1 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_2 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_3 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_4 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_5 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_6 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_7 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_8 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_9 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_10 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_11 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_12 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_13 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_14 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_15 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_16 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_17 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_18 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_19 ?? '' }}
                            </td>
                            <td>
                                {{ $levelSetting->level_20 ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LevelSetting::STATUS_SELECT[$levelSetting->status] ?? '' }}
                            </td>
                            <td>
                                @can('level_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.level-settings.show', $levelSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('level_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.level-settings.edit', $levelSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-LevelSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection