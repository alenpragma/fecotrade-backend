@extends('layouts.main')

@section('content')
    {{-- {{dd(Auth::user()->roles)}} --}}
    @php
        $user_role = Auth::user()->roles->first();
        //dd($user_role);
    @endphp
    @if ($user_role->id == 2)
        <style>
            body {
                margin-top: 20px;
                background: #FAFAFA;
            }

            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg, #4099ff, #73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg, #2ed8b6, #59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg, #FFB64D, #ffcb80);
            }

            .bg-c-pink {
                background: linear-gradient(45deg, #FF5370, #ff869a);
            }

            .table-responsive {
                display: block;
            }

            @media (min-width: 556px) {
                .table-responsive {
                    display: inline-table !important;
                }
            }

            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
        </style>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Gala Wallet</h6>
                        <h2 class="text-right"><a><i class="fa fa-credit-card f-left"></i></a><span></span></h2>
                        <p class="m-b-0"> <span class="f-right"> {{ $data['cash_wallet'] }} Gala</span></p>


                    </div>

                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Bonus Wallet</h6>
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span></span></h2>
                        <p class="m-b-0"><span class="f-right">{{ $data['bonus_wallet'] }} Gala</span></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Mining Wallet</h6>
                        <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span></span></h2>
                        <p class="m-b-0"><span class="f-right">{{ $data['mining_wallet'] }} Gala</span></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block" style="padding: 11px !important;">
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>{{ $data['total_cash'] }}</span></h2>
                        <p class="m-b-0">Total Withdraw<span class="f-right">{{ $data['total_cash_withdraw'] }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-header">
                        Refer List's
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact no</th>
                                    <th>Join At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['referral'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->contact ?? '---' }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center badge badge-warning">No Refer</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">{{ $data['referral']->render() }}</div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        Level Bonus
                    </div>
                    <div class="card-body">
                        <p class="card-title"> Total Earn : <span class="badge badge primary">{{ $data['level_bonus_earn'] }}</span></p>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Received From</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Added Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['level_bonus'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->sender->name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->description ?? '---' }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center badge badge-warning">No Refer</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">{{ $data['level_bonus']->render() }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($user_role->id == 1)
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    @parent
@endsection
