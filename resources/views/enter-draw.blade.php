@extends('layout')
@prepend('choices.css')
    <link rel="stylesheet" href="{{ asset('css/choices.min.css') }}">
@endprepend
@push('choices-js')
    <script src="{{ asset('js/choices.min.js') }}"></script>
@endpush
@push('compress-image')
    <script src="{{ asset('js/compress-image.js') }}"></script>
@endpush
@section('content')
@if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show pr-2 text-center">
            {{ session('status') }}
        </div>
@endif
    <div class="container my-2">
        @if ($errors->any())
            <div class="mb-3 text-center">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col">
              <h3 class="text-center fw-bold">دخول السحب</h3>
            </div>
          </div>

        <form action="{{ route('enterDraw') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="ادخل اسمك الكامل" name="name"
                    required value="{{ old('name') }}">
                <label for="name">الاسم الكامل</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="phone_number" placeholder="ادخل رقم هاتفك" name="phone_number"
                    required value="{{ old('phone_number') }}">
                <label for="phone_number">رقم الجوال</label>
            </div>
            <div class="form-floating">
                <select class="selectpicker form-select" id="store" name="store_id" required>
                    <option selected disabled>اختر اسم المحل</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" {{ old('store_id' == $store->id ? 'selected' : '') }}>{{ $store->name }}</option>
                    @endforeach
                </select>
                <label for="store" class="form-label">اسم المحل</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="bill_no" placeholder="ادخل رقم الفاتورة" name="bill_no"
                    required value="{{ old('bill_no') }}">
                <label for="bill_no">رقم الفاتورة</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="coupon_no" placeholder="ادخل رقم الكوبون" name="coupon_no"
                    required value="{{ old('coupon_no') }}">
                <label for="coupon_no">رقم الكوبون</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="bill_price" placeholder="ادخل قيمةالفاتورة"
                    name="bill_price" required value="{{ old('bill_price') }}">
                <label for="bill_price">قيمة الفاتورة</label>
            </div>
            <div class="mb-3 mt-3">
                <label for="formFileLg" class="form-label">صورة الفاتورة</label>
                <input class="form-control form-control-lg" id="inputImage" name="bill_img" type="file"
                    accept="image/*" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">دخول السحب</button>
            </div>
        </form>
    </div>

@endsection
