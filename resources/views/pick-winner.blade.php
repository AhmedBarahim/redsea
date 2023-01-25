@extends('dashboard.layout')

@section('content')
    <div class="container">
        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show pr-2">
            {{ session('status') }}
        </div>
    @endif
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">

                    @if(session('win'))
                    الفائز بالسحب
                    @else

                    اختيار فائز عشوائيا
                    @endif

                </h1>
            </div>
        </div>
        @if(session('win'))
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">الاسم:</span>{{ $winner->name }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">رقم الجوال:</span>{{ $winner->phone_number }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">اسم المحل:</span>{{ $winner->store->name  }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">رقم الفاتورة:</span>{{ $winner->bill_no }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">مبلغ الفاتورة:</span>{{ $winner->bill_price }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">رقم الكوبون:</span>{{ $winner->coupon_no }}</h4>
        <h4 class="pt-2"><span class="pl-2 font-weight-bold">صورة الفاتورة:</span> <button type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#modal">
            عرض صورة الفاتورة
        </button></h4>
        <h4 style="direction: ltr; text-align:right;" class="pt-2"><span class="pl-2 font-weight-bold">تاريخ دخول السحب:</span>{{ $winner->created_at }}</h4>
         <!-- The Modal -->
         <div class="modal fade" id="modal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="font-weight-bolder">اسم المحل :</span> {{ $winner->store->name }} -
                            <span class="font-weight-bolder">رقم الفاتورة :</span> {{ $winner->bill_no }} -
                            <span class="font-weight-bolder">ملبغ الفاتورة : </span> {{ $winner->bill_price  }} -
                            <span class="font-weight-bolder">رقم الكوبون :</span> {{ $winner->coupon_no }}
                        </h4>
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
        <hr>
        <div class="d-flex justify-content-start">
            {{-- <div class="pl-3">
                <a class="btn btn-success" href="{{ route('showPickWinner') }}">تأكيد الفائز</a>
            </div> --}}
            <form class="pl-3" action="{{ route('acceptPickWinner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <button type="submit" class="btn btn-success">تأكيد الفائز</button>
            </form>
            <form class="pl-3" action="{{ route('rejectPickWinner',['id' => $winner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
              <button type="submit" class="btn btn-danger">رفض الفائز</button>
        </form>
          </div>
          {{ session()->forget('win'); }}
        @else

        <div class="row">
            <div class="col">
                <h4 class="h4 mb-4 text-gray-800">عدد المشاركون بالسحب : {{ $noOfDrawers }}</h4>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('postPickWinner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <button type="submit" class="btn btn-primary">اختيار فائز</button>
            </form>
        </div>

        @endif
    </div>
@endsection
