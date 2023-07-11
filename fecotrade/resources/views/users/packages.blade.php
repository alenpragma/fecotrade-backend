@extends('layouts.admin')
@section('content')
<style>
       .text-right{
           text-align: right;
       }
   </style>

                  <div class="container">
              <h6>Available Amount: {{$data['cash_wallet'] ? 'Gala '.number_format((float)$data['cash_wallet'], 2, '.', '') : 'Gala 00.00'}}</h6>
              <hr>
              <h4 class="btn btn-primary">Package List</h4>
            </div>
            <br>
            @if(Session::has('purchase_successful'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('purchase_successful')}}
            </div>
            </div>
             @elseif(Session::has('purchase_error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('purchase_error')}}
            </div>
            </div>
            @endif
            <br>
            <br>
            <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-2 g-4">
              @foreach($packages as $row)
                <div class="col-md-4">
                    <div class="card">
                      <br>
                     
                      <div class="text-center">
                          
                         <a href="{{ $row->image->getUrl() }}" target="_blank" style="height:100px;width:100px;" class="bd-placeholder-img card-img-top" width="20%" height="20%">
                                        <img src="{{ $row->image->getUrl('thumb') }}">
                                    </a>
                      </div>
                      <hr>

                      <div class="card-body">
                        <div class="input-group mb-3">
                        <!-- <span class="input-group-text" id="basic-addon1"></span> -->
                        <input disabled type="text" class="form-control" style="color:#D98019; font-weight:100%;" value="{{$row->package_name}}" >
                          </div>
                            <div class="input-group mb-3">
                            <span class="input-group-text text-right"  id="basic-addon1" style="color:#D98019;width: 70%; font-weight:100%;">Price (Gala)</span>
                            <input disabled type="text" class="form-control" value="{{$row->price}}" >
                              </div>
                              <div class="input-group mb-3">
                              <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">Total ROI</span>
                              <input disabled type="text" class="form-control" value="{{$row->total_roi}}" >
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">Daily ROI</span>
                                <input disabled type="text" class="form-control" value="{{$row->daily_roi}}" >
                                  </div>
                                  <div class="input-group mb-3">
                                  <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                      Validity (days)</span>
                                  <input disabled type="text" class="form-control" value="{{$row->validity}}" >
                                    </div>
                                    <div class="input-group mb-3">
                                  <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                      No of Level Bonus</span>
                                  <input disabled type="text" class="form-control" value="{{$row->no_of_levels}}" >
                                    </div>
                                    <div class="text-center">
                                      
                                           
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#packagebuymodal{{$row->id}}">Buy Package</button>
                                           @include('users.modals.packagebuymodal')
                                        </form>
                                    </div>

                      </div>
                    </div>
                </div>
                @endforeach



              </div>

@endsection