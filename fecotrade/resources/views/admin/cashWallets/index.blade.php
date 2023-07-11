@extends('layouts.admin')
@section('content')

<div class="card">
    @if(Session::has('Money_added'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('Money_added')}}
         </div>
     </div>
      @elseif(Session::has('Money_rejected'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('Money_rejected')}}
         </div>
     </div>
     
     @endif
    <div class="card-header">
        {{ trans('cruds.cashWallet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-CashWallet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cashWallet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cashWallet.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.cashWallet.fields.amount') }}
                        </th>
                        <th>
                            Deposit Method
                        </th>
                        <th>
                            Wallet No
                        </th>
                        <th>
                           Transaction Id
                        </th>
                       
                        <th>
                            {{ trans('cruds.cashWallet.fields.status') }}
                        </th>
                         <th>
                            Action
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashWallets as $key => $cashWallet)
                        <tr data-entry-id="{{ $cashWallet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cashWallet->id ?? '' }}
                            </td>
                            <td>
                                {{ $cashWallet->user->user_name ?? '' }}
                            </td>
                            <td>
                                {{ $cashWallet->amount ?? '' }}
                            </td>
                            <td>
                                {{ $cashWallet->merchant->wallet_name ?? '' }}
                            </td>
                            <td>
                                {{ $cashWallet->merchant->wallet_no ?? '' }}
                            </td>
                             <td>
                                {{ $cashWallet->txn_id ?? '' }}
                            </td>
                            
                            <td>
                                {{ App\Models\CashWallet::STATUS_SELECT[$cashWallet->status] ?? '' }}
                            </td>
                            <td>
                               
                                @if($cashWallet->status == 'pending')
                                 <a class="btn btn-xs btn-success" href="/home/cash-wallet-approve/{{$cashWallet->id}}">
                                        Approve
                                    </a>
                                     <a class="btn btn-xs btn-danger" href="/home/cash-wallet-reject/{{$cashWallet->id}}">
                                        Reject
                                    </a>
                                
                                
                                @else 
                                No Action Needed 
                                @endif



                            </td>
                            <td></td>

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
  let table = $('.datatable-CashWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection