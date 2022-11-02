@extends('dashboard.layout')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">حذف جوائز</h1>
        @error('prize_type_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ route('prizes.deletePrizes') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="prize_type_id">اختر نوع الجائزة:</label>
                <select class="form-control form-control-lg px-2 py-1"
                    id="prize_type_id" name="prize_type_id" required>
                    <option selected disabled>اختر نوع الجائزة</option>
                    @foreach ($prizeTypes as $prizeTypes)
                        <option value="{{ $prizeTypes->id }}">{{ $prizeTypes->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">حذف</button>
        </form>

    </div>
@endsection
