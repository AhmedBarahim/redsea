@extends('dashboard.layout')
@section('content')

<div class="container">
     @if ($errors->any())
            <div class="mb-3">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <h1 class="h3 mb-4 text-gray-800">إضافة محل جديد</h1>
    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="mx-1">إسم المحل</label>
            <input type="text" class="form-control m-0" placeholder="إدخل إسم المحل" name="name">
          </div>
          <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>
@endsection
