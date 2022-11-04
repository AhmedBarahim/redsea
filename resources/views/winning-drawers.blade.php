@extends('dashboard.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">الفائزون بالسحب</h1>
            </div>
        </div>

        <div class="tab-content">
            <div id="home" class="tab-pane active m-2">
                <table id="example" class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>الاسم</th>
                            <th>رقم الجوال</th>
                            <th>اسم المحل</th>
                            <th>رقم الفاتورة</th>
                            <th>مبلغ الفاتورة</th>
                            <th>صورة الفاتورة</th>
                            <th>تاريخ دخول السحب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($winners as $winner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $winner->name }}</td>
                                <td>{{ $winner->phone_number }}</td>
                                <td>{{ $winner->store->name }}</td>
                                <td>{{ $winner->bill_no }}</td>
                                <td>{{ $winner->bill_price }}</td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-{{ $loop->iteration }}">
                                        عرض صورة الفاتورة
                                    </button>

                                </td>
                                <td style="direction: ltr; text-align:right;">{{ $winner->created_at }}</td>
                            </tr>
                            <!-- The Modal -->
                            <div class="modal fade" id="modal-{{ $loop->iteration }}">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><span class="font-weight-bolder">اسم المحل :</span> {{ $winner->store->name }} - <span class="font-weight-bolder">رقم الفاتورة :</span> {{ $winner->bill_no }} - <span class="font-weight-bolder">ملبغ الفاتورة : </span> {{ $winner->bill_price  }}</h4>
                                            <button type="button" class="close m-0 p-0"
                                                data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body text-center">
                                            <img src="{{ Storage::url($winner->bill_img) }}" class="img-fluid">
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">إغلاق</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
