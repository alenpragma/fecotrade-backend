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
     @endif
    <div class="card-header">
        Add Fund Request
    </div>

    <div class="card-body">
        <a class="btn btn-success mb-5" href="#" data-toggle="modal" data-target="#addfund">Add Fund</a>
         @include('users.modals.addfundmodal')
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-cashWallet">
                <thead>
                    <tr>
                         <th width="20">

                        </th>
                      
                        <th>
                            SL
                        </th>
                        <th>
                           Deposit Method
                        </th>
                        <th>
                            Transcation ID
                        </th>
                        <th>
                           Amount
                        </th>
                        <th>
                           Status
                        </th>
                        <th>
                           Request Date
                        </th>
                        <th>
                            Approval Date
                        </th>
                        <th>
                            &nbsp;
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashwallet_history as $key => $cashwallet)
                        <tr data-entry-id="{{ $cashwallet->id }}">
                            <td></td>
                            <td>
                                {{$loop->index+1}}

                            </td>
                            <td>
                               {{$cashwallet->merchant->wallet_name}}
                            </td>
                            <td>
                               {{$cashwallet->txn_id}}
                            </td>
                            <td>
                               {{$cashwallet->amount}}
                            </td>
                          
                            <td>
                                {{$cashwallet->created_at}}
                            </td>
                            <td>
                                {{$cashwallet->status}}
                            </td>
                            <td>
                               @if($cashwallet->status != 'pending')
                               {{$cashwallet->updated_at}}
                               @else 
                               --
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
  let table = $('.datatable-cashWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
 <script type="text/javascript">

            //alert('success');
            //console.log(this.getAttribute('id'));
            //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
            //var wallet=  document.getElementById("wallet_id");
            //wallet.innerHTML= id.value;
            document.getElementById('DestinationOptions').addEventListener('change', function (e) {
                var wallet2 = e.target.options[e.target.selectedIndex].getAttribute('id');
                //console.log(wallet2);
                var wallet = document.getElementById("wallet_id").value = wallet2;
                //console.log(wallet);
                //wallet.innerHTML= wallet2;
            });

            //  document.getElementById('').value(id.value);


        </script>
@endsection