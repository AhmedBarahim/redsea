@extends('layout')
@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show pr-2 text-center">
            {{ session('status') }}
        </div>
    @else
        @php
            header('Location: ' . URL::to('/enter-draw'), true, 302);
            exit();
        @endphp
    @endif
@endsection
