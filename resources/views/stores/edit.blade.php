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
    <h1 class="h3 mb-4 text-gray-800">تعديل اسم المحل</h1>
    <form action="{{ route('stores.update',['store' => $store->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="mx-1">إسم الجائزة</label>
            <input type="text" class="form-control m-0" placeholder="إدخل إسم الجائزة" name="name"  value="{{ old('name', $store->name) }}" required>
          </div>
          <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
