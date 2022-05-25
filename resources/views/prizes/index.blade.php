@extends('dashboard.layout')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show pr-2">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-8">
                <h1 class="h3 mb-4 text-gray-800">الجوائز</h1>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('prizes.create') }}" class="btn btn-outline-primary float-left"><span
                            class="d-none d-md-inline">إضافة جوائز</span> <span class="mx-1"><i
                                class="fas fa-plus"></i></span></a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('prizes.delete') }}" class="btn btn-outline-danger float-left"><span
                            class="d-none d-md-inline">حذف جوائز</span> <span class="mx-1"><i
                                class="fas fa-trash"></i></span></a>
                    </div>
                </div>

            </div>
        </div>


        <!-- Nav tabs -->
        <ul class="nav nav-tabs p-0">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">كل الجوائز</a>
            </li>
            @foreach ($prizeTypes as $count => $prize_type)
                <li class="nav-item">
                    <a href="#tab-{{ $prize_type->id }}" class="nav-link {{ $count == -1 ? 'active' : '' }}"
                        data-toggle="tab">{{ $prize_type->name }}</a>
                </li>
            @endforeach

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active m-2">
                <table id="example" class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>رقم الجائزة</th>
                            <th class="w-50">الجائزة</th>
                            <th>وقت أخذ الجائزة</th>
                            <th>تم أخذها</th>
                            {{-- <th>العمليات</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prizes as $prize)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prize->prize_no }}</td>
                                <td>{{ $prize->prizeType->name }}</td>
                                <td style="direction: ltr; text-align:right;">{{ $prize->redeemed_at ?? 'لا يوجد' }}</td>
                                <td>{{ $prize->redeemed == 0 ? 'لا' : 'نعم' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

            @foreach ($prizeTypes as $count => $prize_type)
                <div @if ($count == -1) class="tab-pane container active m-2 " @else class="tab-pane container m-2 fade" @endif
                    id="tab-{{ $prize_type->id }}">
                    <table class="table table-hover bg-white" id="example">
                        <thead>
                            <tr>
                                <th>م</th>
                                <th>رقم الجائزة</th>
                                <th class="w-50">الجائزة</th>
                                <th>وقت أخذ الجائزة</th>
                                <th>تم أخذها</th>
                                {{-- <th>العمليات</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                        @endphp
                            @foreach ($prizes as $prize)
                                @if ($prize->prizeType->id == $prize_type->id)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ $prize->prize_no }}</td>
                                        <td>{{ $prize->prizeType->name }}</td>
                                        <td style="direction: ltr; text-align:right;">{{ $prize->redeemed_at ?? 'لا يوجد' }}</td>
                                        <td>{{ $prize->redeemed == 0 ? 'لا' : 'نعم' }}</td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>

                </div>
            @endforeach

        </div>



    </div>
@endsection
