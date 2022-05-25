@extends('dashboard.layout')

@section('content')
{{-- @php
    function check_zero_count(int n) {
        if(n == 0) {
            return 0;
                } else
                 {
                    return n;
                }
    }
@endphp --}}
    <div class="container-fluid">
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h4 class="font-weight-bold mb-1">المسجلون</h4>
                                <h5 class="mb-0 font-weight-bold text-gray-800">{{ $customers_count }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h4 class="font-weight-bold mb-1">الفائزون</h4>
                                <h5 class="mb-0 font-weight-bold text-gray-800">{{ $winners_count }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trophy fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h4 class="font-weight-bold mb-1">أنواع الجوائز</h4>
                                <h5 class="mb-0 font-weight-bold text-gray-800">{{ $prize_types_count }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-award fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-border shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h4 class="font-weight-bold mb-1">الجوائز</h4>
                                <h5 class="mb-0 font-weight-bold text-gray-800">{{ $prizes_count }}</h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-gift fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">إحصائيات أنواع الجوائز</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>الجائزة</th>
                                    <th>عددها (النسبة المئوية)</th>
                                    <th>ما تم أخذه (النسبة المئوية)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>جميع الجوائز</td>

                                    <td>{{ $all_prizes }} (%100)</td>
                                    @php
                                    if($all_prizes ==0) {
                                        $percentage = 0;
                                    }
                                    else {
                                        $percentage = ($all_prizes_taken / $all_prizes) * 100;
                                    }
                                    @endphp
                                    <td>{{ $all_prizes_taken . ' (%' . round($percentage, 2) . ')' }}</td>
                                </tr>
                                @foreach ($prizes_details as $prize)
                                    <tr>
                                        <td>{{ $prize->prizeType->name}}</td>
                                        @php
                                         if($all_prizes == 0) {
                                        $percentage = 0;
                                    } else {
                                        $percentage = ($prize->total / $all_prizes) * 100;

                                    }
                                    @endphp
                                        <td>{{ $prize->total . ' (%' . round($percentage,2) . ')' }}</td>
                                        @php
                                        if($prize->total == 0) {
                                        $percentage = 0;
                                    } else {
                                        $percentage = ($prize->totals / $prize->total) * 100;
                                    }
                                    @endphp
                                        <td>{{ $prize->totals . ' (%' . round($percentage,2) . ')' }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">إحصائيات الجوائز</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>النوع</th>
                                    <th>العدد</th>
                                    <th>النسبة المئوية</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>الجوائز</td>
                                    <td>{{ $prizes_count }}</td>
                                    <td>%100</td>
                                </tr>
                                <tr>
                                    <td>الجوائز التي لم يتم تسليمها</td>
                                    <td>{{ $prizes_delivered }}</td>
                                    @php
                                     if($prizes_count == 0) {
                                        $percentage = 0;
                                    } else {
                                        $percentage = ($prizes_delivered / $prizes_count) * 100;
                                    }
                                    @endphp
                                    <td>{{ '%' . round($percentage, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">إحصائيات المسجلون</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>النوع</th>
                                    <th>العدد</th>
                                    <th>النسبة المئوية</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>المسجلون</td>
                                    <td>{{ $customers_count }}</td>
                                    <td>%100</td>
                                </tr>
                                <tr>
                                    <td>الفائزون</td>
                                    <td>{{ $winners_count }}</td>
                                    @php
                                    if($customers_count == 0) {
                                        $percentage = 0;
                                    } else {
                                        $percentage = ($winners_count / $customers_count) * 100;
                                    }
                                    @endphp
                                    <td>{{ '%' . round($percentage, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
