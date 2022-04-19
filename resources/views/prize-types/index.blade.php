@extends('dashboard.layout')

@section('content')
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show pr-2">
            {{ session('status') }}
        </div>

        @endif
        <div class="row">
            <div class="col-9">
                <h1 class="h3 mb-4 text-gray-800">أنواع الجوائز</h1>
            </div>
            <div class="col-3">
                <a href="{{ route('prize-types.create') }}" class="btn btn-outline-primary float-left"><span class="d-none d-md-inline">إضافة نوع جديد</span> <span class="mx-1"><i class="fas fa-plus"></i></span></a>
            </div>
        </div>



        <table class="table table-hover bg-white">
            <thead>
              <tr>
                <th class="w-75">نوع الجائزة</th>
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($prizeTypes as $prizeTypes)
              <tr>
                <td>{{ $prizeTypes->name }}</td>
                <td>
                    <div class="d-inline">
                        <a href="{{ route('prize-types.edit', $prizeTypes->id) }}" class="btn btn-outline-warning mx-1"><span class="d-none d-md-inline">تعديل</span> <span class="mx-1"><i class="fas fa-edit"></i></span></a>
                        <form class="d-inline" action="{{ route('prize-types.destroy', ['prize_type' => $prizeTypes->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger mx-1"><span class="d-none d-md-inline">حذف</span> <span class="mx-1"><i class="fas fa-trash"></i></span></button>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

    </div>
@endsection
