@extends('dashboard.layout')

@section('content')
    <div class="container">
        {{-- @if ($errors->any())
            <div class="mb-3">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <h1 class="h3 mb-4 text-gray-800">إضافة جوائز</h1>
        @error('prize_type_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ route('prizes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="prize_type_id">اختر نوع الجائزة:</label>
                <select class="form-control form-control-lg px-2 py-1"
                    id="prize_type_id" name="prize_type_id" required>
                    <option selected disabled>اختر نوع الجائزة</option>
                    @foreach ($prizeTypes as $prizeTypes)
                        <option value="{{ $prizeTypes->id }}">{{ $prizeTypes->name }}</option>
                    @endforeach
                </select>
                <label for="name">عدد الجوائز</label>
                <input type="text" class="form-control form-control-lg  @error('no_of_prizes') is-invalid @enderror" placeholder="عدد الجوائز" name="no_of_prizes" id="no_of_prizes"
                    required>
                    @error('no_of_prizes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
        {{-- <div class="row">
            <form method="POST" enctype="multipart/form-data" action="{{ route('prizes.store') }}">
                @csrf
                <div class="col-lg-6 col-sm-12 form-group mx-auto my-2">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="prize_type_id" id="prize_type_id" required>
                            <option selected>اختر نوع الجائزة</option>
                            @foreach ($prizeTypes as $prizeTypes)
                                <option value="{{ $prizeTypes->id }}">{{ $prizeTypes->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">نوع الجائزة</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" id="no_of_prizes" name="no_of_prizes"
                            placeholder="عدد الجوائز" required>
                        <label class="required" for="no_of_prizes">عدد الجوائز</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            إنشاء
                        </button>
                    </div>
                </div>

            </form>
        </div> --}}

    </div>
@endsection
