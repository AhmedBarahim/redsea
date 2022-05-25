@extends('dashboard.layout')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">المسجلون</h1>
    <div class="table-responsive">
        <table class="table table-hover bg-white" id="example">
            <thead>
              <tr>
                <th>م</th>
                <th>الاسم</th>
                <th>رقم الجوال</th>
                <th>Mac Address</th>
                <th>اخر عملية فحص</th>
                <th>عدد عمليات الفحص</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $customer->name }}</td>
                  <td>{{ $customer->phone_number }}</td>
                  <td style="direction: ltr; text-align:right;">{{ $customer->mac_address }}</td>
                  <td style="direction: ltr; text-align:right;">{{ $customer->last_time_scanned ?? 'لا يوجد' }}</td>
                  <td>{{ $customer->no_of_scans ?? 'لا يوجد' }}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
