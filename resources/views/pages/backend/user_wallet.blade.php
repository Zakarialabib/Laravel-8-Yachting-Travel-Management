@extends('layouts.backend')

@section('page-title') Wallets Managements @endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted">Wallet Balance </h6>
                                <h2>{{$userWallet->balance}}DH</h2>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-wallet success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card pull-up">
                <div class="card-header">
                    <h4 class="card-title text-center">{{--Wallet Credits and Debits--}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                <h6 class="danger text-bold-600">Debits</h6>
                                <h4 class="text-bold-100">&#x20a6;{{number_format(($walletDebits/100),2)}}</h4>
                            </div>
                            <div class="col-md-6 col-12 text-center">
                                <h6 class="success text-bold-600">Credits</h6>
                                <h4 class="text-bold-100">&#x20a6;{{number_format(($walletCredits/100),2)}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top Up Wallet</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-12">
                                 <img src="" class="img-responsive col-md-12"/>
                           </div>
                           <div class="col-md-12">

                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> My Wallet Log</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                            <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered file-export">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userWalletLogs as $serial => $walletLog)
                                    <tr>
                                        <td>{{$serial}}</td>
                                        <td>&#x20a6; {{number_format(($walletLog->amount/100),2)}}</td>
                                        <td>
                                            @if($walletLog->status == 1)
                                                <p class="success"> Credit</p>
                                            @elseif($walletLog->status == 0)
                                                <p class="danger"> Debit</p>
                                            @endif
                                        </td>
                                        <td>
                                            {{\App\WalletLogType::find($walletLog->type_id)->name}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection



@section('javascript')
    <script src="{{asset('backend/js/pages/user_wallet.js')}}"></script>
@endsection

@section('css')

@endsection