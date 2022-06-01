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
    <h1 class="h3 mb-4 text-gray-800">إضافة نوع جائزة جديد</h1>
    <form action="{{ route('prize-types.update',['prize_type' => $prizeTypes->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="mx-1">إسم الجائزة</label>
            <input type="text" class="form-control m-0" placeholder="إدخل إسم الجائزة" name="name"  value="{{ old('name', $prizeTypes->name) }}" required>
            <div class="form-check-inline mt-2">
                <label class="form-check-label">
                    <input type="checkbox" name="status" class="form-check-input mx-1" {{ $prizeTypes->status ? '' : 'checked'}}>حظ أوفر</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
