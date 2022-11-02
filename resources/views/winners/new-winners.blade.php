@extends('dashboard.layout')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">الفائزون الجدد</h1>
        <div class="table-responsive">
            <table class="table table-hover bg-white" id="example">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>الاسم</th>
                        <th>رقم الجوال</th>
                        <th>الجائزة</th>
                        <th>رقم الجائزة</th>
                        <th>وقت الفحص</th>
                        <th>تأكيد الاستلام</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($winners) }} --}}
                    @foreach ($winners as $winner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $winner->customer->name }}</td>
                            <td>{{ $winner->customer->phone_number }}</td>
                            <td>{{ $winner->prize->prizeType->name }}</td>
                            <td>{{ $winner->prize->prize_no }}</td>
                            <td style="direction: ltr; text-align:right;">{{ $winner->prize->redeemed_at ?? 'لا يوجد' }}
                            </td>
                            <form action="{{ route('winners.update', ['winner' => $winner]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td> <button class="btn btn-info" type="submit">
                                        <span class="d-none d-md-inline">جاري التأكيد</span>
                                        <span class="spinner-border spinner-border-sm mr-1"
                                            style="margin-bottom: 0.35rem !important;"></span>
                                    </button> </td>
                            </form>

                            {{-- <td>{{ $winner->delivered }}</td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
@endsection
