@extends('layout')

@section('content')
     @if ($errors->any())
            <div class="mb-3 text-center">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- Nav pills -->
    <ul class="nav nav-pills justify-content-center" role="tablist">
      <li class="nav-item">
        <a class="nav-link border border-2 border-primary active mx-2" data-bs-toggle="pill" href="#register">تسجيل لأول مرة</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border border-2 border-primary mx-2" data-bs-toggle="pill" href="#login">تسجيل دخول</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content pb-3 text-center">
      <div id="register" class="container tab-pane active">
        <form action="registeration" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="ادخل اسمك الكامل"
                    name="name" required>
                <label for="name">الاسم الكامل</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="phone_number" placeholder="ادخل رقم هاتفك"
                    name="phone_number" required>
                <label for="phone_number">رقم الجوال</label>
            </div>
            <input name="platform_name" type="hidden" value="{{ $platform_name }}">
            <input name="device_family" type="hidden" value="{{ $device_family }}">
            <input name="device_model" type="hidden" value="{{ $device_model }}">

            <button type="submit" class="btn btn-primary">تسجيل</button>
        </form>
      </div>
      <div id="login" class="container tab-pane fade">
        <form action="sign-in" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="phone_number" placeholder="ادخل رقم هاتفك"
                    name="phone_number" required>
                <label for="phone_number">رقم الجوال</label>
            </div>
            <button type="submit" class="btn btn-primary">تسجيل</button>
        </form>
      </div>
    </div>
  </div>

@endsection
