@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    @if ($invlm->isNotEmpty())
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Billing</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ 'IDR '.number_format($card1->netamt) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="{{ $card2->netamt>$card1->netamt?'text-danger':'text-success' }} mr-2"><i class="fa {{ $card2->netamt>$card1->netamt?'fa-arrow-up':'fa-arrow-down' }}"></i>{{ $card1->netamt!=0?number_format((($card2->netamt-$card1->netamt)/$card1->netamt)*100,2):0 }}%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Electricity</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ number_format($card1->elec_usage,2) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="ni ni-bulb-61"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="{{ $card2->elec_usage>$card1->elec_usage?'text-danger':'text-success' }} mr-2"><i class="fas {{ $card2->elec_usage>$card1->elec_usage?'fa-arrow-up':'fa-arrow-down' }}"></i> {{ $card1->elec_usage!=0?number_format((($card2->elec_usage-$card1->elec_usage)/$card1->elec_usage)*100,2):0 }}%</span>
                                        <span class="text-nowrap">Since last Month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Water</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ number_format($card1->water_usage,2) }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="ni ni-world-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="{{ $card2->water_usage>$card1->water_usage?'text-danger':'text-success' }} mr-2"><i class="fas {{ $card2->water_usage>$card1->water_usage?'fa-arrow-up':'fa-arrow-down' }}"></i>{{ $card1->water_usage!=0?number_format((($card2->water_usage-$card1->water_usage)/$card1->water_usage)*100,2):0 }}%</span>
                                        <span class="text-nowrap">Since yesterday</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Billing</h5>
                                            <span class="h2 font-weight-bold mb-0">0</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Electricity</h5>
                                            <span class="h2 font-weight-bold mb-0">0</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="ni ni-bulb-61"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-successr mr-2"><i class="fas fa-arrow-down"></i> 0%</span>
                                        <span class="text-nowrap">Since last week</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Last Month Water</h5>
                                            <span class="h2 font-weight-bold mb-0">0</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="ni ni-world-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-down"></i> 0%</span>
                                        <span class="text-nowrap">Since yesterday</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" colspan="3" style="font-size: 1rem">Billing Information - {{ date("M Y") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($inv as $item)
                                    <tr><td style="width: 15%">Cust Id</td><td style="width: 5%">:</td><td>{{ $item->custid }}</td></tr>
                                    <tr><td>Cust Name</td><td>:</td><td>{{ $item->custname }}</td></tr>
                                    <tr><td>Unit</td><td>:</td><td>{{ $item->unitid." ( ".$item->unitiddesc." ) " }}</td></tr>
                                    <tr><td>Invoice No</td><td>:</td><td>{{ $item->id }}</td></tr>
                                    <tr><td>Due Date</td><td>:</td><td>{{ date_format(date_create($item->paymentsch),'d M Y') }}</td></tr>
                                    <tr><td>Amount</td><td>:</td><td>{{ $item->curr." ".number_format($item->netamt,0) }}</td></tr>
                                    <tr><td colspan="3"><strong>Electricty</strong></td></tr>
                                    <tr><td colspan="3">
                                        <table class="table align-items-center table-flush">
                                           <tr><th>Begin</th><th>End</th><th>Usage</th><th>KWH Price</th><th>Amount</th></tr>
                                           <tr><td>{{ number_format($item->elec_begin,2) }}</td><td>{{ number_format($item->elec_end,2) }}</td><td>{{ number_format(abs($item->elec_end - $item->elec_begin),2) }}</td><td>{{  $item->curr." ".number_format($item->elec_price,0) }}</td><td>{{ $item->curr." ".($item->elec_usage!=$item->minusage?number_format($item->elec_amt,0):number_format(0,0))}}</td></tr>
                                           <tr><th colspan="2"></th><th>KVA</th><th>KVA Price </th><th>Amount</th></tr>
                                           <tr><td colspan="2">Minimum Charge</td><td>{{ number_format($item->ctelec,2) }}</td><td>{{ number_format(abs($item->elec_price * 40),2) }}</td><td>{{  $item->curr." "}}
                                            @if ($item->elec_usage!=$item->minusage)
                                            {{  number_format(0,0) }}
                                            @else
                                            {{ number_format($item->elec_amt,0) }}
                                            @endif</td></tr>
                                            <tr><td colspan="3"></td><td><strong>Sub Total</strong></td><td>{{ $item->curr." ".number_format($item->elec_amt,0) }}</td></tr>
                                            <tr><td colspan="3"></td><td>PPJU{{ ' '.number_format($item->elec_pju_rate,2).' ' }}%</td><td>{{ $item->curr." ".number_format($item->elec_pju,0) }}</td></tr>
                                            <tr><td colspan="3"></td><td><strong>Total Electricity</strong></td><td>{{ $item->curr." ".number_format(($item->elec_pju+$item->elec_amt),0) }}</td></tr>
                                        </table>
                                    </td></tr>
                                    <tr><td colspan="3"><strong>Water</strong></td></tr>
                                    <tr><td colspan="3">
                                        <table class="table align-items-center table-flush">
                                            <tr><th>Begin</th><th>End</th><th>Usage</th><th>M3 Price</th><th>Amount</th></tr>
                                            <tr><td>{{ number_format($item->water_begin,2) }}</td><td>{{ number_format($item->water_end,2) }}</td><td>{{ number_format(abs($item->water_end - $item->water_begin),2) }}</td><td>{{  $item->curr." ".number_format($item->water_price,0) }}</td><td>{{ $item->curr." ".number_format($item->water_amt,0)}}</td></tr>
                                            @if ($item->water_adv_amt!=0)
                                            <tr><td colspan="2">Advance Water</td><td>{{  ($item->space_unit)/10}}</td><td>{{$item->curr." ". number_format($item->water_price,0) }}</td><td>{{ $item->curr." ".number_format($item->water_adv_amt,0)}}</td></tr>
                                            @endif
                                            <tr><td colspan="3"></td><td>Abodemen</td><td>{{ $item->curr." ".number_format($item->water_sub,0)  }}</td>
                                            <tr><td colspan="3"></td><td><strong>Sub Total</strong></td><td>{{ $item->curr." ".number_format(($item->water_sub+$item->water_adv_amt+$item->water_amt),0)  }}</td>
                                            <tr><td colspan="3"></td><td>Water Maintenance</td><td>{{ $item->curr." ".number_format(($item->water_maint),0)  }}</td>
                                            <tr><td colspan="3"></td><td><strong>Total Water</strong></td><td>{{ $item->curr." ".number_format(($item->water_sub+$item->water_adv_amt+$item->water_amt+$item->water_maint),0)  }}</td>
                                        </table>
                                    </td></tr
                                    <tr><td colspan="3">
                                        <table class="table align-items-center table-flush">
                                            <tr><td colspan="2" style="width: 10px"><strong>Service Charge</strong></td><td>{{  number_format($item->space_unit,2)}} sqm </td><td>x</td><td>{{ $item->curr." ".number_format($item->svc_price,0) }}</td><td><strong>{{ $item->curr." ".number_format($item->svc_amt,0) }}</strong></td></tr>
                                            <tr><td colspan="2" style="width: 10px"><strong>Sinking Fund</strong></td><td>{{  number_format($item->space_unit,2)}} sqm </td><td>x</td><td>{{ $item->curr." ".number_format($item->sink_price,0) }}</td><td><strong>{{ $item->curr." ".number_format($item->sink_amt,0) }}</strong></td></tr>
                                            @if ($item->ret_amt!=0)
                                            <tr><td colspan="2" style="width: 10px"><strong>Resident Fee</strong></td><td></td><td></td><td></td><td><strong>{{ $item->curr." ".number_format($item->ret_amt,0) }}</strong></td></tr>
                                            @endif
                                            <tr><td colspan="2" style="width: 10px"><strong>Total Invoice</strong></td><td></td><td></td><td></td><td><strong>{{ $item->curr." ".number_format(($item->ret_amt+$item->svc_amt+$item->sink_amt+$item->water_sub+$item->water_adv_amt+$item->water_amt+$item->water_maint+$item->elec_pju+$item->elec_amt),0) }}</strong></td></tr>
                                            <tr><td colspan="2" style="width: 10px"><strong>Rounding</strong></td><td></td><td></td><td></td><td><strong>{{ $item->curr." ".number_format($item->netamt,0) }}</strong></td></tr>
                                        </table>
                                    </td></tr>

                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                {{-- <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-xl-4">
                {{-- <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--<div class="row mt-5">-->
            {{-- <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col">Unique users</th>
                                    <th scope="col">Bounce rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        /argon/
                                    </th>
                                    <td>
                                        4,569
                                    </td>
                                    <td>
                                        340
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/index.html
                                    </th>
                                    <td>
                                        3,985
                                    </td>
                                    <td>
                                        319
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/charts.html
                                    </th>
                                    <td>
                                        3,513
                                    </td>
                                    <td>
                                        294
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/tables.html
                                    </th>
                                    <td>
                                        2,050
                                    </td>
                                    <td>
                                        147
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/profile.html
                                    </th>
                                    <td>
                                        1,795
                                    </td>
                                    <td>
                                        190
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Referral</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        1,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        5,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">70%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Google
                                    </th>
                                    <td>
                                        4,807
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">80%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Instagram
                                    </th>
                                    <td>
                                        3,678
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">75%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        twitter
                                    </th>
                                    <td>
                                        2,645
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">30%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>--}}
        <!--</div>-->

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
