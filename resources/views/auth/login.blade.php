@extends('layout')

@section('content')
    <div class="container">
        <div class="container mb-3">
            <div class="row text-center">
                <h3>تسجيل دخول</h3>
                @if ($errors->any())
                    <div class="mb-3">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="username" placeholder="ادخل اسمك الكامل"
                            name="username" required>
                        <label for="username">اسم المستخدم</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="password" placeholder="ادخل رقم هاتفك"
                            name="password" required>
                        <label for="password">كلمة المرور</label>
                    </div>
                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>

                        <label class="form-check-label" for="remember">
                            تذكرني
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">تسجيل</button>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
