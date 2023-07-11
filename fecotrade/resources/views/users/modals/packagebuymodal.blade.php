<div class="modal fade text-left" id="packagebuymodal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Buy Package</h4>
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

                              


                        <div class="mb-3">
                            Are you sure you want to Buy this Package?

                          
                        </div>
                        
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <form id="jquery-val-form" action="{{route('buy-package')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="package_id" value="{{$row->id}}">

                <button type="submit" class="btn btn-primary">Buy With Cash Balance</button>
                </form>
                
            </div>
              </form>
        </div>
    </div>
</div>
