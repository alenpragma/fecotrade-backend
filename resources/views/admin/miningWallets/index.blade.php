@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.miningWallet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MiningWallet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.method') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.receiver') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.received_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.miningWallet.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($miningWallets as $key => $miningWallet)
                        <tr data-entry-id="{{ $miningWallet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $miningWallet->id ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->user ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->amount ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->type ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->method ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->receiver ?? '' }}
                            </td>
                            <td>
                                {{ $miningWallet->received_from ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\MiningWallet::STATUS_SELECT[$miningWallet->status] ?? '' }}
                            </td>
                            <td>



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
  let table = $('.datatable-MiningWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection