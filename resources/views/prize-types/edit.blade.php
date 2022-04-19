@extends('dashboard.layout')
@section('content')

<div class="container">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <h1 class="h3 mb-4 text-gray-800">إضافة نوع جائزة جديد</h1>
    <form action="{{ route('prize-types.update',['prize_type' => $prizeTypes->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="mx-1">إسم الجائزة</label>
            <input type="text" class="form-control m-0" placeholder="إدخل إسم الجائزة" name="name"  value="{{ old('name', $prizeTypes->name) }}" required>
          </div>
          <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
