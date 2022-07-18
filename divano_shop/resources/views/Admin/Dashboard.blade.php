@extends('LayoutAdmin')
@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
            <p class="text-subtitle text-muted">Một bảng điều khiển tốt để hiển thị số liệu thống kê của bạn</p>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>USER</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ number_format($userCount) }}</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class = 'card-title'> Doanh thu </h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ number_format($sumprofit) }}</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class = 'card-title'> Đơn hàng </h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ number_format($orderSum) }}</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Sales Today</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ number_format($orderTodaySum) }}</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class='card-heading p-1 pl-3'>Sales</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="pl-3">
                                        <h1 class='mt-5'>{{ number_format($sum) }}</h1>
                                        <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                    width="15"></i> +19%</span> so với tháng trước </p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <canvas id="bar3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class = "card-title"> Đặt hàng ngay hôm nay </h4>
                            <div class="d-flex ">
                                <i data-feather="download"></i>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <div class="table-responsive">
                                <table class='table mb-0' id="table1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{--  <th>Status</th>  --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($TableOrder) > 0)
                                        @php
                                            foreach ($TableOrder as $table){
                                                $customer = App\Customer::where('customer_id',$table->cus_id)->get();
                                            }
                                        @endphp

                                        @foreach ($customer as $cus)
                                        <tr>
                                            <td>{!! $cus->customer_name !!}</td>
                                            <td>{!! $cus->customer_email !!}</td>
                                            <td>{!! $cus->customer_phone !!}</td>
                                            {{--  <td>
                                                @foreach ($cus->cusTo as $status)
                                                @if ($status->order_status == 1)
                                                <span class="badge bg-danger">Processing</span>
                                                @elseif($status->order_status == 2)
                                                <span class="badge bg-info">Being Transported</span>
                                                @else
                                                <span class="badge bg-success">Completely Payment</span>
                                                @endif
                                                @endforeach
                                            </td>  --}}
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header">
                            <h4> Thu nhập của bạn </h4>
                        </div>
                        <div class="card-body">
                            <div id="radialBars"></div>
                            <div class="text-center mb-5">
                                <h6> Từ tháng trước </h6>
                                <h1 class='text-green'>+{{ number_format($totalLastMonth) }}</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/chartjs/Chart.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('backend/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        //Bar
        var _ydata = {!! json_encode($months) !!};
        var _xdata = {!! json_encode($monthsCount) !!};
        //ORDERS
        var _yorder = {!! json_encode($months2) !!};
        var _xorder = {!! json_encode($countTotal) !!};
        //SALES TODAY
        var _yorderToday = {!! json_encode($months4) !!};
        var _xorderToday = {!! json_encode($countTotal4) !!};
        //REVENUE
        var _xrevenue = {!! json_encode($revenue) !!};
        //User
        var _yuser = {!! json_encode($months3) !!};
        var _xuser = {!! json_encode($countTotal3) !!};
        //Earnings
        var TotalEer = {{ $totalLastMonth }};
        var _yearnings = {!! json_encode($labels) !!};
        var _xearnings = {!! json_encode($series) !!};
    </script>
    <script src="{{ asset('backend/assets/js/pages/dashboard.js') }}"></script>

@endsection
