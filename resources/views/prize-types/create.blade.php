@extends('dashboard.layout')
@section('content')

<div class="container">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <h1 class="h3 mb-4 text-gray-800">إضافة نوع جائزة جديد</h1>
    <form action="{{ route('prize-types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="mx-1">إسم الجائزة</label>
            <input type="text" class="form-control m-0" placeholder="إدخل إسم الجائزة" name="name">
          </div>
          <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>
@endsection
