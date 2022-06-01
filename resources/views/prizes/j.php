  <!-- Nav tabs -->
  <ul class="nav nav-tabs p-0" role="tablist">
            {{-- <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">كل الجوائز</a>
            </li> --}}
            @foreach ($prizeTypes as $count => $prize_type)
            <li class="nav-item">
                <a class="nav-link {{ $count == 0 ? 'active' : '' }}" data-toggle="tab" href="#m{{ $prize_type->id }}">{{ $prize_type->id }}</a>
            </li>
                 @endforeach

            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
            </li> --}}
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            {{-- <div id="home" class="container tab-pane active"><br>
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th class="w-75">الجائزة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prizes as $prize)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prize->prizeType->name }}</td>
                                <td>
                                    <div class="d-inline">
                                        <a class="btn btn-outline-warning mx-1"><span class="d-none d-md-inline">تعديل</span> <span
                                                class="mx-1"><i class="fas fa-edit"></i></span></a>
                                        <form class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger mx-1"><span
                                                    class="d-none d-md-inline">حذف</span> <span class="mx-1"><i
                                                        class="fas fa-trash"></i></span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div> --}}
            @foreach ($prizeTypes as $count => $prize_type)
            <div id="#m{{ $prize_type->id }}" class="container tab-pane fade {{ $count == 0 ? 'active' : '' }}"><br>
                <h3>{{ $prize_type->id  }}</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
            @endforeach


            {{-- <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                    rem aperiam.</p>
            </div> --}}
        </div>


        {{-- <ul class="list-group">
            @foreach ($prizes as $prize)
                <li class="list-group-item">{{ $prize->prizeType->name }}</li>
            @endforeach
        </ul> --}}
