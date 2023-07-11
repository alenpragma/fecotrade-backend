@extends('layouts.admin')
@section('content')
@can('admin_wallet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.admin-wallets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.adminWallet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.adminWallet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AdminWallet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.adminWallet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminWallet.fields.wallet_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminWallet.fields.wallet_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.adminWallet.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminWallets as $key => $adminWallet)
                        <tr data-entry-id="{{ $adminWallet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $adminWallet->id ?? '' }}
                            </td>
                            <td>
                                {{ $adminWallet->wallet_name ?? '' }}
                            </td>
                            <td>
                                {{ $adminWallet->wallet_no ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AdminWallet::STATUS_SELECT[$adminWallet->status] ?? '' }}
                            </td>
                            <td>
                                @can('admin_wallet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.admin-wallets.show', $adminWallet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('admin_wallet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.admin-wallets.edit', $adminWallet->id) }}">
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
  let table = $('.datatable-AdminWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection