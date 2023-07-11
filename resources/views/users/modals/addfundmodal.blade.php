<div class="modal fade text-left" id="addfund" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Fund</h4>
                <button type="button" class="btn-primary close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <section id="multiple-column-form">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">

                              <div class="card-body">

                              <form method="post" action="{{route('add-fund')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="mb-3">

                          <?php
                          $admin_wallets= App\Models\AdminWallet::where('status',1)->get();

                           ?>
                           <label for="email-id-column">Select Gateway<span
                                   class="text-danger">*</span></label>
                        <select id="DestinationOptions" name="wallet_id" class="form-control" aria-label="Default select example" required>
                            <option label="Choose Wallet"></option>
                          @foreach($admin_wallets as $payment)

                        <option id="{{$payment->wallet_no}}" value="{{$payment->id}}">{{$payment->wallet_name}}</option>
                        @endforeach
                      </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Wallet or Account No.</label>

                            <input type="text" name="wallet_id" disabled id="wallet_id" class="form-control"required/>
                        </div>
                         <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Transaction ID</label>

                          <input type="text" name="txn_id" class="form-control" required/>


                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Amount (Gala)</label>
                            <input type="round" class="form-control" name="amount" placeholder="Enter Amount" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Deposit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
            </div>
              </form>
        </div>
    </div>
</div>
